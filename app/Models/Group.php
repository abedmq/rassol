<?php

namespace App\Models;

use App\Helpers\Datatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Self_;

class Group extends Model {

    use Datatable;
    protected $guarded = [];

    const MAX_CONTACT_COUNT = 2;

    protected $dates = ['creation', 'subjectTime'];

    function users()
    {
        return $this->belongsToMany(User::class, "group_user");
    }

    function contacts()
    {
        return $this->belongsToMany(Contact::class, "contact_group");
    }

    function scopeIsNew($q)
    {
        $q->whereNull('image')->orWhere('image', '')->orWhere('image', 'default')->orWhere('updated_at', '<', Carbon::now()->subDays(10));
    }

    function admins()
    {
        return $this->belongsToMany(Contact::class, "group_admin")->withPivot("type");
    }

    function tags()
    {
        return $this->belongsToMany(Tag::class, "group_tag");
    }


    function managers()
    {
        return $this->belongsToMany(User::class, 'user_group_manage', 'group_id');
    }


    function messages()
    {
        return $this->belongsToMany(Message::class, 'message_group');
    }

    function getImage()
    {
        if (!$this->image || $this->updated_at->diffInDays(Carbon::now()) > 2)
        {
//            $this->getInfoRequest();
        }
        return $this->image && $this->image != 'default' ? "storage/" . $this->image : "front/media/default_group.svg";
    }

    function getCreation()
    {
        return $this->creation ? $this->creation : Carbon::now();
    }

    function scopeActive($q)
    {
//        $q->whereNotNull('creation');
    }

    function scopeAdmin($q)
    {

        $q->whereHas('admins', function ($q) {
            $q->where('remote_id', auth()->user()->detail->wid ?? '-1');
        });
    }


    static function checkAndAdd($remoteId, $user)
    {
        $group = self::where('remote_id', $remoteId)->first();

        if (!$group)
        {
            $group = self::create(['remote_id' => $remoteId]);
        }
        $group->getInfo($user);
        $import = $user->import;
        if (!$import->groups()->where('id', $group->id)->first())
            $import->groups()->attach($group->id);

        if ($user->id)
            try
            {
                $group->users()->attach($user->id);
            } catch (\Exception $e)
            {
                da($e->getMessage());
            }
        return $group;
    }


    function getMobile()
    {
        return explode('@', $this->remote_id)[0];
    }

    function getInfo($user)
    {
//        $response     = Http::withHeaders(['X-Session-Token' => env('GO_TOKEN'), 'user_id' => auth()->id(), "remote_id" => $this->remote_id])
//->post('http://' . env('GO_URL') . "/api/get-group-info");
        \Log::info("start get contact for group :" . $this->id . ": with user " . $user->id . " ,remote_id:" . $this->remote_id);
        $response = whatsapp()->getGroupInfo($this->remote_id, $user);
        \Log::info('get info response', ['res' => $response]);

        if (checkWhatsappResponse($response))
        {
            $responseText = $response->msg;
            $groupInfo    = json_decode($responseText);
            if (!json_last_error())
            {
                if (!isset($groupInfo->status))
                {
                    return $this->addData($groupInfo, $user);
                }
            }
        } else
        {
            da($response);
        }
        return false;
    }


    function addData($groupInfo, $user)
    {
        $data = [
            'owner'        => $groupInfo->owner,
            'subject'      => $groupInfo->subject,
            'creation'     => Carbon::createFromTimestamp($groupInfo->creation),
            'subjectTime'  => Carbon::createFromTimestamp($groupInfo->subjectTime),
            'subjectOwner' => $groupInfo->subjectOwner,
        ];

        $this->update($data);
        foreach ($groupInfo->participants as $participant)
        {
            $contact = Contact::checkAndAdd($participant->id, $user);
            try
            {
                $this->contacts()->attach($contact->id);
            } catch (\Exception $e)
            {
                da($e->getMessage());
            }
            if ($participant->isAdmin || $participant->isSuperAdmin)
            {
                $type = $participant->isSuperAdmin ? "super_admin" : "admin";
                try
                {
                    $this->admins()->attach([$contact->id => ['admin_type' => $type]]);
                } catch (\Exception $e)
                {
                    da($e->getMessage());
                }
            }
        }
        return sizeof($groupInfo->participants);
    }

    function getInfoRequest()
    {
        try
        {
            if (auth()->check())
                $id = auth()->id();
            else
                $id = env("DEFAULT_ID");
            $response = Http::timeout(5)->withHeaders(['X-Session-Token' => env('GO_TOKEN'), 'user_id' => $id, "remote_id" => $this->remote_id])->post('http://' . env('GO_URL') . "/api/get-contact-info");
            $profile  = json_decode($response->object()->profile);
//        dd($response->object());
//        dd($profile);
            if (isset($profile->status) && $profile->status)
            {
                $this->update(['image' => 'default']);
            } else
            {
                $name = "images/" . get_image_name($profile->eurl);
                Storage::put('public/' . $name, file_get_contents($profile->eurl));
                $this->update(['image' => $name]);
            }

        } catch (\Exception $e)
        {
            \Log::error("import contact error", [
                'id'  => $this->id,
                'msg' => $e->getMessage()]);
        }
    }
}