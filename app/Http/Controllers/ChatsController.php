<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ChatsController extends Controller {

    public function index($id = 0)
    {
        //
        if (!auth()->user()->detail)
        {
            if (auth()->user()->isAdmin())
                return redirect()->route('whatsapp.link');
            return redirect()->route('whatsapp.login');
        }

        $groups = auth()->user()->getGroupsManage();
        if (!$groups->count() && auth()->user()->isAdmin())
            return redirect('whatsapp/link')->with('error', 'الرجاء اختيار مجموعات لادارتها');
        $groupSelected = null;
        if ($id)
            $groupSelected = $groups->where('id', $id)->first();

        return view('front.whatsapp.index', compact('groups', 'groupSelected'));
    }

    function send(Request $request)
    {
        $this->validate($request, [
            'msg'       => 'required',
            'images'    => 'nullable|array|max:4',
            'groups_id' => 'required|array|min:1',
        ]);


        $user = auth()->user();
        if (!$user->canSendMsg())
        {
            return $this->response(['status' => 'fail'])->error("لا يمكنك ارسال الرسائل");
        }
//        dd($request->groups_id);
        $recipients = $user->getGroupsManage()->whereIn('id', $request->groups_id);


        if (!$recipients->count())
        {
            return $this->response(['status' => 'fail'])->error("الرجاء احتيار مجموعة واحدة على الاقل");
        }
        if ($user->detail)
        {
//        To Do
//        image message
            $recipients = $recipients->keyBy('remote_id');

            if ($request->images && sizeof($request->images))
            {
                foreach ($request->images as $key => $image)
                {
                    $name = Str::replaceFirst("temp", 'messages', $image);
                    if (Storage::exists($image))
                    {
                        Storage::move($image, $name);
                        if (sizeof($request->images) == ($key + 1))
                        {
                            break;
                        }
                        $msg = $user->detail->messages()->create(['type' => 'image', 'text' => '', 'url' => $name]);
                        $rs  = whatsapp()->sendMsg($msg, $recipients->pluck('remote_id')->toArray());
                        $msg->addGroups($rs);

                    }
                }
            }

            $text = str_replace('&nbsp;', '', $request->msg);


            $msg = $user->detail->messages()->create(['type' => isset($name) ? 'image' : 'text', 'text' => $text, 'url' => isset($name) ? $name : ""]);
            $rs  = whatsapp()->sendMsg($msg, $recipients->pluck('remote_id')->toArray());
            if ($rs === 0 || $rs === -1)
            {
                $msg->delete();
                if ($rs === 0)
                {
                    return $this->response()->error("الرجاء التأكد من اتصال الواتساب على الجوال");
                } else
                {
                    return $this->response()->route("whatsapp.login");
                }
            } else
                $msg->addGroups($rs, $recipients);
        }
        return $this->response()->success("تم الارسال بنجاح");
    }


    function revokeMsg($id)
    {
        $message = Message::findOrFail($id);
        $status  = $message->revoke();
        if ($status)
            return $this->response()->success("تم الحذف بنجاح");
        return $this->response()->error("حصل خطأ أثناء عملية الحذف");
    }

    function messages($id = 0)
    {
        if ($id)
            $messages = auth()->user()->messages()->with('groups')->whereHas('groups', function ($q) use ($id) {
                $q->where('id', $id);
            })->latest()->get(10);

        else
            $messages = auth()->user()->messages()->latest()->with('groups')->paginate(10);

        $view = view("front.whatsapp.partials.messages", compact('messages'))->render();
        return $this->response(['html' => $view])->success("تم جلب البيانات");
    }
}