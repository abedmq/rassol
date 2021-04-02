<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PackageRequest;
use App\Models\Package;

class PackagesController extends BaseController {

    protected $modelClass = Package::class;
    protected $title      = 'الباقات';
    protected $route      = 'packages';


    function store(PackageRequest $request)
    {
        return self::saveData($request->validated(), $request->id);
    }

    function update(Package $package, PackageRequest $request)
    {
        return self::saveData($request->validated(), $package);
    }

}