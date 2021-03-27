<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model {

    protected $fillable
        = ['whatsapp_name',
           'lc',
           'lg',
           'platform',
           'wid',
           'battery',
           'phone_model',
           'phone_man',
           'phone_os',
           'tos',
           'connected',
           'is24h',
           'is_go_login',
           'field_id',
        ];

    function tags()
    {
        return $this->belongsToMany(Tag::class, 'detail_tag', 'detail_id');
    }

//    function groups()
//    {
//        return $this->belongsToMany(Group::class, 'user_group_manage', 'detail_id');
//    }

    function messages()
    {
        return $this->hasMany(Message::class, "account_id");
    }

    function getMobile()
    {
        return explode('@', $this->wid)[0] ?? '';
    }

    function users()
    {
        return $this->hasMany(User::class, 'detail_id');
    }
}