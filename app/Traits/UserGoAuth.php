<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UserGoAuth {

    function getGoAuth($update = false)
    {
        if (!$this->go_auth || $update)
        {
            $this->go_auth = Str::random(30);
            $this->save();
        }
        return $this->go_auth;
    }
}