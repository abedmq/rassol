<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FieldRequest;
use App\Models\Field;

class FieldsController extends BaseController {

    protected $modelClass = Field::class;
    protected $title      = 'المجالات';
    protected $route      = 'fields';


    function store(FieldRequest $request)
    {
        return self::saveData($request->validated(), $request->id);
    }

}