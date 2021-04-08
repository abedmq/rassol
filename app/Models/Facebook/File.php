<?php

namespace App\Models\Facebook;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model {

    use HasFactory;

    protected $connection = 'facebook';

    protected $guarded = [];
    const NEW_STATUS         = 0;
    const IN_PROGRESS_STATUS = 1;
    const IDLE_STATUS        = 2;
    const COMPLETE_STATUS    = 3;

    function scopeCanImport($q)
    {
        $q->where('status', '!=', self::COMPLETE_STATUS);
    }
}

