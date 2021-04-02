<?php

namespace App\Models;

use App\Helpers\Datatable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    use Datatable;
    protected $fillable = ['title'];
    protected $dateFormat='Y-m-d H:i:s';

//    protected function getDateFormat()
//    {
//        return 'YYYY-MM-DDThh:mm:ss.sTZD';
//    }

}