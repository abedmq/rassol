<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagRequest;
use App\Models\Tag;

class TagsController extends BaseController {

    protected $modelClass = Tag::class;
    protected $title      = 'الاهتمامات';
    protected $route      = 'tags';


    function store(TagRequest $request)
    {
        return self::saveData($request->validated(), $request->id);
    }

}