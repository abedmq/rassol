<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    protected $fillable = ['title'];
    protected $dateFormat='Y-m-d H:i:s';

//    protected function getDateFormat()
//    {
//        return 'YYYY-MM-DDThh:mm:ss.sTZD';
//    }

}