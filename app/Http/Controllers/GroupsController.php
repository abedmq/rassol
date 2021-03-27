<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GroupsController extends Controller {

    public function index(Request $request)
    {
        //

        if ($request->update == 1)
        {
            whatsapp()->getChats(auth()->user());
        }
        $user          = auth()->user();
        $managedGroups = $user->getGroupsManage();
        $groups        = $user->groups()->active()->admin()->withCount('contacts')->get()->sortByDesc('order_count');
        $view          = view('front.whatsapp.partials.group_list', compact('groups', 'user', 'managedGroups'))->render();
        return $this->response(['view' => $view])->success('تم جلب الارقام');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'recipients_id' => 'required|array|min:1',
            'subject'       => 'required',
        ]);

        $user = auth()->user();
        if (!$user->canCreateNewGroup())
        {
            return $this->response(['status' => 'fail'])->error("لم يتبقى لديك مجموعات لادارتها");
        }
        if (!$user->isAdmin())
            return $this->response(['status' => 'fail'])->error("لا يمكنك اضافة مجموعات");

        $recipients = $user->contacts()->whereIn('id', $request->recipients_id)->pluck('remote_id')->toArray();
        $response   = Http::withHeaders([
            'X-Session-Token' => env('GO_TOKEN'),
            'user_id'         => auth()->id(),
        ])->asForm()->post('http://' . env('GO_URL') . "/api/create-group", [
            'recipients_id' => json_encode($recipients),
            'subject'       => $request->subject,
        ]);
        if ($response->status() == 200 && ($response->object()->status ?? "") == 'success')
        {
            $data  = json_decode($response->object()->rs);
            $group = Group::checkAndAdd($data->gid ?? $data['gid']);
            $user->groupsManage()->attach($group->id);
            return $this->response()->success("تمت اضافة المجموعة");

        }
        return $this->response()->error("حصل خطأ اثناء اتشاء المجموعة");
    }

    function update($id, Request $request)
    {
        $this->validate($request, [
            'mobile'    => "required",
            'operation' => "required|in:add_member",
        ]);

    }


    function createNewGroups(Request $request)
    {
        if (!auth()->user()->isAdmin())
            return $this->response(['status' => 'fail'])->error("لا يمكنك اضافة مجموعات");

        $this->validate($request, [
            'countries_id' => 'nullable|array',
            'users_id'     => 'nullable|array',
            'count'        => 'required|integer|min:1|max:' . auth()->user()->getRemainGroupCount(),
            'name'         => 'required',
            'start_count'  => 'required',
        ]);


        $myGroups   = auth()->user()->groups()->admin()->with('contacts')->get();
        $myContcats = data_get($myGroups, '*.contacts.*');


        $query = Contact::
//        whereNotIn('id', array_column($myContcats, 'id'))
        whereIn('remote_id', ['972599460550@s.whatsapp.net', '970598700543@s.whatsapp.net',
                              '972598700543@s.whatsapp.net', '972592471020@s.whatsapp.net']);
        if (is_array($request->countries_id) && sizeof($request->countries_id))
            $query->whereIn('country_code', $request->countries_id);
        $contacts = $query->get();

        $start = intval($request->start_count);
        if (is_array($request->users_id) && sizeof($request->users_id))
            $adminsRemotesId = getWid(auth()->user()->users()->active()->whereIn('id', $request->users_id)->get());
        else
            $adminsRemotesId = getWid(auth()->user()->users()->active()->get());
        $created = 0;

        for ($i = 0; $i < intval($request->count); $i++)
        {
            $pluck = $contacts->take(Group::MAX_CONTACT_COUNT);
            if (!$pluck->count())
                break;
            $recipients = $pluck->pluck('remote_id')->toArray();
            $recipients = array_merge($recipients, $adminsRemotesId);
            $name       = $request->name . " " . ($start + $i);

//            dd($recipients);
            $rs = whatsapp()->createGroup($name, $recipients);

            if ($rs)
            {

                $group = Group::checkAndAdd($rs->gid, auth()->user());

                whatsapp()->setGroupAdmins($group, $adminsRemotesId);
                auth()->user()->groupsManage()->attach($group);
            }
            $created++;
        }

        return $this->response()->success("تم انشاء $created قروب");
    }


    function select(Request $request)
    {
        $this->validate($request, [
            'groups_id' => 'required|array|min:1',
        ]);
        $user          = auth()->user();
        $managedGroups = $user->getGroupsManage();
        $groups        = $user->groups()->active()->admin()->whereIn('id', $request->groups_id)->get();

        if (!$user->isAdmin())
            return $this->response(['status' => 'fail'])->error("لا يمكنك اضافة مجموعات");


        if ($user->getMaxGroupsManage() >= $groups->count() + $managedGroups->count())
        {
            $user->groupsManage()->attach($groups);
            return $this->response()->success('تم اضافة المجموعات بنجاح');
        } else
        {
            return $this->response()->error("لقد تجاوزت الحد الاقصى من المجوعات المسموح لك بادارتها ");
        }
    }
}