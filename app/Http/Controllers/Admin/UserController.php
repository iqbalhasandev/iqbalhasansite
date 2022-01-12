<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin\Role;
use Illuminate\Http\Request;
use App\Traits\User\Settings;
use Laravel\Fortify\Rules\Password;
use App\Http\Controllers\Controller;
use App\Models\Admin\UserStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    use Settings;

    /**
     * Middleware
     *
     *
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['store']);
        $this->middleware(['permission:user_browse'])->only(['index']);
        $this->middleware(['permission:user_create'])->only(['create', 'store']);
        $this->middleware(['permission:user_show'])->only(['show']);
        $this->middleware(['permission:user_edit'])->only(['edit', 'update']);
        $this->middleware(['permission:user_delete'])->only(['destroy']);



        \config_set('theme.cdata', [
            'title' => 'User table',
            'model' => 'User',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'User Table',
                    'link' => false
                ],
            ],
            'add' => \route('admin.user.create')
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
            'description' => 'Displaying all Users.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        $users = User::cacheData();
        return \view('pages.admin.user.index', \compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \config_set('theme.cdata', [
            'title' => 'Create New User',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'User Table',
                    'link' => \route('admin.user.index')
                ],

                [
                    'name' => 'User Create New User',
                    'link' => false
                ],
            ],
            'add' => false,


            'description' => 'Creating new User.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));


        return \view('pages.admin.user.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // seo
        $this->seo()->setTitle('Store New User');
        $this->seo()->setDescription('Store new user data in a database.');
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', new Password, 'confirmed'],
            'user_status_id' => ['required', 'integer', 'in:' . \collect(UserStatus::cacheData())->pluck('id')->implode(',')],
            'role' => ['required', 'integer', 'in:' . \collect(Role::cacheData())->pluck('id')->implode(',')]
        ]);
        if ($request->hasFile('avatar')) {
            $request->validate([
                'avatar' => 'image',
            ]);

            $data['profile_photo_path'] = $request->avatar->store('users');
        }
        $user = User::create($data)->assignRole($data['role'])->syncPermissions($data['permissions']);
        $user->forgetCache();
        // flash message
        Session::flash('success', 'Successfully Stored new user data.');
        return \redirect()->route('admin.user.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        \config_set('theme.cdata', [
            'title' => 'User Information',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'User Table',
                    'link' => \route('admin.user.index')
                ],

                [
                    'name' => 'User Information',
                    'link' => false
                ],
            ],

            'description' => 'Display Single User Information.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));


        return \view('pages.admin.user.show', \compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        \config_set('theme.cdata', [
            'title' => 'Edit User Information',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'User Table',
                    'link' => \route('admin.user.index')
                ],

                [
                    'name' => 'Edit User Information',
                    'link' => false
                ],
            ],
            'add' => false,
            'edit' => route('admin.user.edit', $user->id),
            'update' => route('admin.user.update', $user->id),
            'description' => 'Edit existing user data.',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        return \view('pages.admin.user.create_edit', ['data' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();
        // seo
        $this->seo()->setTitle('Update User');
        $this->seo()->setDescription('Update existing user data.');
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'user_status_id' => ['required', 'integer', 'in:' . \collect(UserStatus::cacheData())->pluck('id')->implode(',')],
            'role' => ['required', 'integer', 'in:' . \collect(Role::cacheData())->pluck('id')->implode(',')]
        ]);
        if ($request->password) {
            $request->validate([
                'password' => ['required', 'string', new Password, 'confirmed'],
            ]);
        } else {
            unset($data['password']);
        }
        if ($request->hasFile('avatar')) {
            $request->validate([
                'avatar' => 'image',
            ]);

            $data['profile_photo_path'] = $request->avatar->store('users');
            \delete_file($user->profile_photo_path);
        }
        $user->update($data);

        if ($user->id != auth()->user()->id) {
            $user->syncRoles($data['role'])->syncPermissions($data['permissions']);
        } else {
            $user->user_status_id = 2;
            $user->save();
            Session::flash('error', 'You Can\'t Updated Your User Account Status Or Role.');
        }
        $user->forgetCache();
        // flash message
        Session::flash('success', 'Successfully Updated user account.');
        return \redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        if (auth()->user()->id == $user->id) {
            Session::flash('error', 'You can\'t delete your account.');
            return \redirect()->route('admin.user.index');
        }
        $user->removeRole($user->roles()->first());
        $user->delete();
        $user->forgetCache();
        Session::flash('success', 'Successfully deleted user account.');

        return \redirect()->route('admin.user.index');
    }


    /**
     * View Use Profile
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {

        \config_set('theme.cdata', [
            'title' => 'Profile',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard')
                ],
                [
                    'name' => 'Profile',
                    'link' => false
                ],
            ],
            'description' => 'User Profile Information',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        return \view('pages.admin.user.show', ['user' => Auth::user(), 'profile' => true]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function statusUpdate(User $user, Request $request)
    {
        $old_status_id = $user->user_status_id;
        /**
         *
         * authorized check
         */

        if (!can('user_edit') || !request()->ajax()) {
            return abort(403);
        }


        if (\auth()->user()->id == $user->id) {
            return \response('error', 403);
        }
        $user->update(['user_status_id' => $request->status_id]);

        $user->forgetCache();


        return \response($user);
    }
}
