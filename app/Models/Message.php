<?php

namespace App\Models;

use App\Helpers\Datatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Message extends Model {

    use Datatable;
    protected $fillable = ['text', 'type', 'url', 'deleted_at', 'sending_error'];

    protected $dates = ['deleted_at'];

    function groups()
    {
        return $this->belongsToMany(Group::class, 'message_group')->withPivot('whatsapp_id', 'sending_at', 'deliver_at', 'deleted_at');
    }

    function account()
    {
        return $this->belongsTo(UserDetail::class);
    }

    function getImage()
    {
        return 'storage/' . $this->url;
    }

    function revoke()
    {
        $msgsId = $this->groups->pluck('pivot.whatsapp_id', 'remote_id')->toArray();
        $rs     = whatsapp()->revokeMsg($msgsId);
        foreach ($rs as $k => $r)
        {
            if ($k == 'status')
                continue;
            DB::table('message_group')->where('whatsapp_id', $k)->update(['deleted_at' => Carbon::now(), 'revoked_id' => $r]);
        }
        $this->update(['deleted_at' => Carbon::now()]);
        return $rs;
    }

    function addGroups($rs, $recipients)
    {
        if ($rs)
        {
            foreach ($rs as $k => $r)
            {

                if (isset($recipients[$k]) && $k != 'status')
                {
                    $this->groups()->attach([$recipients[$k]->id => ['whatsapp_id' => $r, 'sending_at' => Carbon::now()]]);
                }
            }
        } else
        {
            $this->update(['sending_error' => 1]);
        }
    }

    function getText()
    {
        $text          = $this->text;
        $newText       = '';
        $isStartStrong = false;
        $isStartS      = false;
        $isStartEm     = false;
        $length        = strlen($text);
        for ($i = 0; $i < $length; $i++)
        {
            $item = $text[$i];
            if ($item == '*')
            {
                if ($isStartStrong)
                {
                    $newText       .= "</strong>";
                    $isStartStrong = false;
                } else
                {
                    $newText       .= "<strong>";
                    $isStartStrong = true;
                }
            }
            else if ($item == '_')
            {
                if ($isStartEm)
                {
                    $newText   .= "</em>";
                    $isStartEm = false;
                } else
                {
                    $newText   .= "<em>";
                    $isStartEm = true;
                }
            }
            else if ($item == '~')
            {
                if ($isStartS)
                {
                    $newText  .= "</s>";
                    $isStartS = false;
                } else
                {
                    $newText  .= "<s>";
                    $isStartS = true;
                }
            }else{
                $newText  .= $item;
            }
        }
//        $text = str_replace("_", "<em>", $text);
//        $text = str_replace("~", "<s>", $text);
        return $newText;
    }
}