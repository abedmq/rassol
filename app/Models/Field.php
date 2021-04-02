<?php

namespace App\Models;

use App\Helpers\Datatable;
use Illuminate\Database\Eloquent\Model;

class Field extends Model {
    use Datatable;
    protected $fillable = ['title'];
}