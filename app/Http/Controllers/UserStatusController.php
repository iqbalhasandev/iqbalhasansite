<?php

namespace App\Http\Controllers;

use App\Models\Admin\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserStatusController extends Controller
{


    /**
     * Middleware
     *
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:user_status_management'])->only(['index']);
        \config_set('theme.cdata', [
            'title' => 'User Status Table',
            'model' => 'UserStatus',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'User Status Table',
                    'link' => false
                ],
            ],
            'add' => \route('admin.user-status.create')
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \config_set('theme.cdata', [
            'description' => 'Display a listing of User Status in Database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        $collection = UserStatus::cacheData();

        return \view('pages.admin.user-status.index', \compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        \config_set('theme.cdata', [
            'title' => 'Create New User Status',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'User Status Table',
                    'link' => \route('admin.user-status.index')
                ],

                [
                    'name' => 'Create New User Status',
                    'link' => false
                ],
            ],
            'add' => false,


            'description' => 'Create new user status in a database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));



        return \view('pages.admin.user-status.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:user_statuses,name']
        ]);
        // return $request->all();
        $userStatus = UserStatus::create([
            'name' => \ucfirst($request->name),
            // 'guard_name' => implode('_', explode(' ', Str::lower($request->guard_name ?? \config('permission.guard_name'))))
        ]);

        $userStatus->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Stored new User Status data.');
        return \redirect()->route('admin.user-status.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UserStatus $userStatus)
    {

        \config_set('theme.cdata', [
            'title' => 'Edit User Status Information',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'User status Table',
                    'link' => \route('admin.user-status.index')
                ],

                [
                    'name' => 'Edit user status Information',
                    'link' => false
                ],
            ],
            'add' => false,
            'edit' => route('admin.user-status.edit', $userStatus->id),
            'update' => route('admin.user-status.update', $userStatus->id),
            'description' => 'Edit existing user status data.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));


        return \view('pages.admin.user-status.create_edit', ['data' => $userStatus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserStatus $userStatus)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $userStatus->update([
            'name' => ucfirst($request->name),
        ]);

        $userStatus->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Updated User Status data.');
        return \redirect()->route('admin.user-status.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserStatus $userStatus)
    {
        $userStatus->delete();
        $userStatus->forgetCache();
        // flash message
        Session::flash('success', 'Successfully deleted User Status data.');
        return \redirect()->route('admin.user-status.index');
    }
}
