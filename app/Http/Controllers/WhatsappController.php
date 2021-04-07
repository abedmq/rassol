<?php

namespace App\Http\Controllers;

use App\Jobs\ImportContacts;
use App\Jobs\StartImport;
use App\Models\Contact;
use App\Models\Field;
use App\Models\Group;
use App\Models\Tag;
use App\Models\UserDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WhatsappController extends Controller {

    public function login()
    {
        //
        if ((!auth()->user()->detail) && auth()->user()->isAdmin())
            return redirect()->route('whatsapp.link')->with('error', 'الرجاء اكمال التسجيل');
        return view('front.whatsapp.auth.login');

    }

    function refresh()
    {
//        if ((!$this->user->imported_at) || Carbon::now()->diffInDays($this->user->imported_at) > 15)
//        {
//        StartImport::dispatch(auth()->user());

        ImportContacts::dispatch(auth()->user());

//        $chats = whatsapp()->getChats(auth()->user());
//        if (!checkWhatsappResponse($chats))
//        {
//            return $this->getWhatsappResponse($chats);
//        }
        return $this->response()->success("يتم التحديث تلقائيا");
//        }
//        return $this->response()->error('لا يمكنك تحديث البيانات اكثر من مرة في اليوم ');
    }


    public function linkWhatsapp()
    {
        //
        if (auth()->user()->detail && auth()->user()->getGroupsManage()->count())
            return redirect()->route('whatsapp.login')->with('error', 'الرجاء تسجيل الدخول');
        auth()->user()->update(['is_go_login' => false]);
        $fields = Field::all();
        $tags   = Tag::all();
        return view('front.whatsapp.auth.link', compact('fields', 'tags'));
    }

    function loginSuccess()
    {
//        $response     = Http::withHeaders(['X-Session-Token' => env('GO_TOKEN'), 'user_id' => auth()->id()])->post('http://' . env('GO_URL') . "/api/get-info");
        $responseData = whatsapp()->getInfo();

        if (!$responseData)
            return $this->response()->error("حصل خطأ غير معروف");

        if ($responseData->status == 'success')
        {
            $user = auth()->user();
            if ($user->detail && $user->detail->wid != $responseData->wid && $user->detail->wid)
            {
                whatsapp()->logout();
                $id = auth()->user()->getGoAuth(true);
                return $this->response()->error("الرجاء تسجيل الدخول بنفس الرقم المسجل لدينا")->with('id', $id);
            }
            $data                  = [];
            $data['whatsapp_name'] = $responseData->name;
            $data['lc']            = $responseData->lc;
            $data['lg']            = $responseData->lg;
            $data['platform']      = $responseData->platform;
            $data['wid']           = $responseData->wid;
            $data['battery']       = $responseData->battery;
            $data['phone_model']   = $responseData->phone_model;
            $data['phone_man']     = $responseData->phone_man;
            $data['phone_os']      = $responseData->phone_os;
            $data['tos']           = $responseData->tos;
            $data['connected']     = $responseData->connected;
            $data['is24h']         = $responseData->is24h;

            if ($user->detail)
                $user->detail()->update($data);
            else
                $user->detail()->create($data);
            auth()->user()->update(['is_go_login' => true]);
        }
        ImportContacts::dispatch(auth()->user());
        return $this->response()->success("تم حفظ البيانات بنجاح");
    }

    function getInitGroup(Request $request)
    {
        if (!auth()->user()->isAdmin())
            abort(404);
        $user = auth()->user();
        if ($user->imported_at)
        {
            $groups = $user->groups()->active()->admin()->withCount('contacts')->get()->sortByDesc('order_count');
            $view   = view('front.whatsapp.partials.whatsapp-groups', compact('groups'))->render();
            return response(['html' => $view, 'status' => 'success']);
        } else
        {
            return response(['status' => 'import']);
        }
    }

    function setInfo(Request $request)
    {
        $this->validate($request, [
            'field_id'  => 'required|exists:fields,id',
            'tags_id'   => 'required|array|min:1',
            'tags_id.*' => 'exists:tags,id',
        ]);

        $user = auth()->user();

        if ($user->detail)
            $user->detail()->update($request->only('field_id'));
        else
            $user->detail()->create($request->only('field_id'));

        $user->detail->tags()->sync($request->tags_id);
        return $this->response()->success("");
    }

    function addGroup(Request $request)
    {
        $this->validate($request, [
            'groups_id' => 'array|required',
        ]);

        $user   = auth()->user();
        $groups = $user->groups()->active()->admin()->whereIn('id', $request->groups_id)->get();

        if ($groups->count() > auth()->user()->getMaxGroupsManage())
        {
            return $this->response()->error("لا يمكنك اضافة أكثر من " . auth()->user()->getMaxGroupsManage() . " مجموعة لادارتها");
        }
        $user->groupsManage()->sync($groups);
        return $this->response()->success("تم حفظ البيانات");
    }

    function getUserInfo()
    {
        $user = auth()->user();
        $view = view('front.whatsapp.partials.account_details', compact('user'))->render();
        return $this->response(['html' => $view])->success('');
    }

    function getWhatsappResponse($status)
    {
        if ($status === 0)
        {
            return $this->response()->error("الرجاء التأكد من اتصال الواتساب على الجوال");
        } elseif ($status === -1)
        {
            return $this->response()->route('whatsapp.login')->error("الرجاء تسجيل الدخول");
        }
        return redirect()->back();
    }
}