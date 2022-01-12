<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{

    /**
     * Middleware
     *
     *
     */
    public function __construct()
    {
        $this->middleware(['auth', 'permission:user_role_management']);



        \config_set('theme.cdata', [
            'title' => 'Role table',
            'model' => 'Role',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Role Table',
                    'link' => false
                ],
            ],
            'add' => \route('admin.role.create')
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
            'description' => 'Display a listing of roles in Database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        $collection = Role::cacheData();

        return \view('pages.admin.role.index', \compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        \config_set('theme.cdata', [
            'title' => 'Create New Role',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Role Table',
                    'link' => \route('admin.role.index')
                ],

                [
                    'name' => 'Create New Role',
                    'link' => false
                ],
            ],
            'add' => false,


            'description' => 'Create new role in a database.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));



        return \view('pages.admin.role.create_edit');
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
        $this->seo()->setTitle('Store New Role');
        $this->seo()->setDescription('Store new role in a database.');

        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles,name']
        ]);
        // return $request->all();
        $role = Role::create([
            'name' => \ucfirst($request->name),
            // 'guard_name' => implode('_', explode(' ', Str::lower($request->guard_name ?? \config('permission.guard_name'))))
        ]);

        $role->syncPermissions($request->permissions ?? '');
        $role->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Stored new role data.');
        return \redirect()->route('admin.role.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {

        \config_set('theme.cdata', [
            'title' => 'Edit Role Information',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Role Table',
                    'link' => \route('admin.role.index')
                ],

                [
                    'name' => 'Edit Role Information',
                    'link' => false
                ],
            ],
            'add' => false,
            'edit' => route('admin.role.edit', $role->id),
            'update' => route('admin.role.update', $role->id),
            'description' => 'Edit existing role data.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));


        return \view('pages.admin.role.create_edit', ['item' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);
        // return $request->name;
        $role->update([
            'name' => ucfirst($request->name),
            // 'guard_name' => implode('_', explode(' ', Str::lower($request->guard_name ?? \config('permission.guard_name'))))

        ]);

        $role->syncPermissions($request->permissions ?? '');
        $role->forgetCache();

        // flash message
        Session::flash('success', 'Successfully Updated role data.');
        return \redirect()->route('admin.role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        $role->forgetCache();
        // flash message
        Session::flash('success', 'Successfully deleted role data.');
        return \redirect()->route('admin.role.index');
    }
}
