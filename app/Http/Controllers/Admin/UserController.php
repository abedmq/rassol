<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends BaseController {

    protected $modelClass = User::class;
    protected $title      = 'المستخدمين';
    protected $route      = 'users';

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    function show(User $user)
    {
        $query = $user->users()->search();
        return parent::index($query); // TODO: Change the autogenerated stub
    }

    function index($query = null)
    {
        $query = User::withCount('groups')->search()->admin();
        return parent::index($query); // TODO: Change the autogenerated stub
    }

    public function create()
    {
        //
        return $this->response()->view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        //
        $data              = $request->validated();
        $data['type']      = 'admin';
        $data['active_at'] = Carbon::now();
        return $this->saveData($data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        return $this->response()->with('item', $user)->view('admin.users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
        return $this->saveData($request->validated(), $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */

}