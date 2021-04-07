<?php


function settings($key, $defaultValue = false)
{
    $settings = Cache::remember('settings', 5000,
        function () {
            return \App\Models\Setting::get()->pluck('value', 'key')->toArray();
        }
    );
    return (isset($settings[$key]) ? $settings[$key] : ($defaultValue ?: ''));
}

function isGroup($remoteId)
{
    return (\Illuminate\Support\Str::endsWith(\Illuminate\Support\Str::lower($remoteId), "@g.us"));
}

function da($msg)
{
//    echo $msg . "<br>";
}

function whatsapp()
{
    return (new \App\Libraries\WhatsappLibrary());
}

function get_image_name($name)
{
    $urls     = explode('?', $name);
    $segments = explode('/', $urls[0]);
    \Illuminate\Support\Facades\Log::info($segments[sizeof($segments) - 1] ?? '');
    return $segments[sizeof($segments) - 1] ?? '';
}

function checkWhatsappResponse($status)
{
    if ($status === 0 || $status === -1)
    {
        return false;
    }
    return true;
}

function get_message_format($text)
{
    $text = str_replace("<strong>", "*", $text);
    $text = str_replace("</strong>", "*", $text);
    $text = str_replace("<em>", "_", $text);
    $text = str_replace("</em>", "_", $text);
    $text = str_replace("<s>", "~", $text);
    $text = str_replace("</s>", "~", $text);
    return strip_tags($text);
}

function getWid($users)
{
    $remotesId = [];
    foreach ($users as $user)
    {
        if ($user->detail && $user->detail->wid)
        {
            $remotesId[] = $user->detail->wid;
        }
    }
    return $remotesId;
}