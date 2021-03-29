<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Self_;

class Import extends Model {

    protected $guarded=[];
    function groups()
    {
        return $this->belongsToMany(Group::class, 'imports_groups')->withPivot('status');
    }

    function scopeNotComplete($q)
    {
        $q->whereHas('groups', function ($q) {
            $q->where('status', 0);
        });
    }

    function scopeNotActive($q)
    {
//        $q->where('last_start', '<',Carbon::now()->subMinutes(config('env.minutes_to_restart_import', 30)));
    }
}