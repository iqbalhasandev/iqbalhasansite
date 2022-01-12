<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{

    /**
     * Middleware
     *
     *
     */
    public function __construct()
    {
        $this->middleware(['auth', 'permission:user_permission_management']);

        \config_set('theme.cdata', [
            'title' => 'Permission table',
            'model' => 'Permission',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Permission Table',
                    'link' => false
                ],
            ],
            'add' => \route('admin.permission.create')
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
            'description' => 'Display a listing of permissions in Database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        $collection = Permission::cacheData();

        return \view('pages.admin.permission.index', \compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        \config_set('theme.cdata', [
            'title' => 'Create New Permission',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Permission Table',
                    'link' => \route('admin.permission.index')
                ],

                [
                    'name' => 'Create New Permission',
                    'link' => false
                ],
            ],
            'add' => false,


            'description' => 'Create new permission in a database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));


        return \view('pages.admin.permission.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // seo
        $this->seo()->setTitle('Store New Permission');
        $this->seo()->setDescription('Store new permission in a database.');

        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:permissions,name']
        ]);
        // return $request->name;
        $permission = Permission::create([
            'name' => implode("_", \explode(' ', Str::lower($request->name))),
            // 'guard_name' => implode('_', explode(' ', Str::lower($request->guard_name ?? \config('permission.guard_name'))))

        ]);
        // forget cache
        $permission->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Stored new permission data.');
        return \redirect()->route('admin.permission.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        \config_set('theme.cdata', [
            'title' => 'Edit Permission Information',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Permission Table',
                    'link' => \route('admin.permission.index')
                ],

                [
                    'name' => 'Edit Permission Information',
                    'link' => false
                ],
            ],
            'add' => false,
            'edit' => route('admin.role.edit', $permission->id),
            'update' => route('admin.role.update', $permission->id),
            'description' => 'Edit existing permission data.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));


        return \view('pages.admin.permission.create_edit', ['item' => $permission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        // return $request->name;
        $permission->update([
            'name' => implode("_", \explode(' ', Str::lower($request->name))),
            // 'guard_name' => implode('_', explode(' ', Str::lower($request->guard_name ?? \config('permission.guard_name'))))
        ]);
        // forget cache
        $permission->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Updated permission data.');
        return \redirect()->route('admin.permission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        // forget cache
        $permission->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Updated permission data.');
        return \redirect()->route('admin.permission.index');
    }
}
