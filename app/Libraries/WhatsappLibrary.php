<?php


namespace App\Libraries;


use App\Models\Contact;
use App\Models\Group;
use Illuminate\Support\Facades\Http;

class WhatsappLibrary {

    private $req;
    private $url;

    public function __construct()
    {
        $this->url = 'http://' . config('services.GO_URL') . "/api/";
    }

    function createGroup($subject, $recipients)
    {
        $req      = $this->prepareReq(auth()->user());
        $response = $req->post('http://' . config('services.GO_URL') . "/api/create-group", [
            'recipients_id' => json_encode($recipients),
            'subject'       => $subject,
        ]);
        $data     = $response->object();
        if ($response->status() == 200 && $data->status == 'success')
        {
            return json_decode($data->rs);
        }
        return false;
    }

    function addMemberGroup($group, $contacts)
    {
        $req        = $this->prepareReq(auth()->user());
        $recipients = $contacts->pluck('id')->toArray();
        $response   = $req->post('http://' . config('services.GO_URL') . "/api/create-group", [
            'recipients_id'   => json_encode($recipients),
            'group_remote_id' => $group->id,
        ]);
        $data       = $response->object();
        if ($response->status() == 200 && $data->status == 'success')
        {
            return $data;
        }
        return false;
    }

    function setGroupAdmins($group, $admins)
    {
        if ($group instanceof Group)
            $group = $group->remote_id;
        $req      = $this->prepareReq(auth()->user());
        $response = $req->post('http://' . config('services.GO_URL') . "/api/set-group-admin", [
            'admins_id'       => json_encode($admins),
            'group_remote_id' => $group,
        ]);
        $data     = $response->object();
        if ($response->status() == 200 && $data->status == 'success')
        {
            return $data;
        }
        return false;
    }

    function connect($user)
    {
        $req      = $this->prepareReq($user);
        $response = $req->post('http://' . config('services.GO_URL') . "/api/connect");
        $items    = $this->checkResponse($response);
        return (!$items) && $items != -1;
    }

    function getChats($user)
    {
        $req = $this->prepareReq($user);

//        $response = Http::withHeaders(['X-Session-Token' => env('GO_TOKEN'), 'user_id' => auth()->id()])
        $response = $req->post('http://' . config('services.GO_URL') . "/api/get-chats");

        \Log::info("start import", (array)$response->object());

        $items = $this->checkResponse($response);

        $chats = [];

        if ($items !== 0 && $items !== -1)
        {
//
            foreach ($items as $remoteId => $val)
            {
                if ($remoteId !== 'status')
                {
                    if (isGroup($remoteId))
                    {
                        Group::checkAndAdd($remoteId, $user);

                    } else
                    {
                        Contact::checkAndAdd($remoteId, $user);
                    }
                    $chats[] = $remoteId;

                }
            }
            \Log::info('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
            $this->disconnect($user);

            return $chats;
        } else
            return $items;
    }

    function getInfo()
    {
        $req      = $this->prepareReq(auth()->user());
        $response = $req->post('http://' . config('services.GO_URL') . "/api/get-info");
        if ($response->status() == 200)
            return $response->object();
        return false;
    }

    function logout()
    {
        $req      = $this->prepareReq(auth()->user());
        $response = $req->post('http://' . config('services.GO_URL') . "/api/logout");
        if ($response->status() == 200)
            return $response->object();
        return false;
    }

    function disconnect($user = null)
    {
        $req      = $this->prepareReq($user);
        $response = $req->post('http://' . config('services.GO_URL') . "/api/disconnect");
        if ($response->status() == 200)
            return $response->object();
        return false;
    }

    function getGroupInfo($remoteId, $user)
    {
        \Log::info("getGroupInfo", $user->toArray());
        $req = $this->prepareReq($user);

        $response = $req->post('http://' . config('services.GO_URL') . "/api/get-group-info", [
            "remote_id" => $remoteId,
        ]);
        return $this->checkResponse($response);
    }


    function sendMsg($msg, $recipients)
    {
        $req      = $this->prepareReq(auth()->user());
        $response = $req->post('http://' . config('services.GO_URL') . "/api/send-msg", [
            'recipients_id' => json_encode($recipients),
            'text'          => $msg->text,
            'type'          => $msg->type,
            'url'           => url("storage/" . $msg->url),
        ]);
//        $data     = $response->object();
        return $this->checkResponse($response);
    }

    function revokeMsg($msgsId)
    {
        $req      = $this->prepareReq(auth()->user());
        $response = $req->post('http://' . config('services.GO_URL') . "/api/revoke-msg", [
            'msgs_id' => json_encode($msgsId),
        ]);

        $data = $response->object();
        if ($response->status() == 200 && $data->status == 'success')
        {
            return $data;
        }
        return false;
    }

    function prepareReq($user)
    {
        return Http::withHeaders([
            'X-Session-Token' => config('services.GO_TOKEN'),
            'user_id'         => ($user ?: auth()->user())->getGoAuth(),
        ])->asForm();
    }

    function checkResponse($response)
    {
        $data = $response->object();

        \Log::info("whatsapp response ", (array)$response->object());

        if ($response->status() == 200)
        {
            if ((!isset($data->status)) || $data->status == 'success')

                return $data;
            else if ($data->status == "need_login")
                return -1;
            else if ($data->status == "not_connected")
                return 0;
        }
        return 0;

    }
}