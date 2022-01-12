<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Auth\StatefulGuard;
use Laravel\Fortify\Http\Responses\LogoutResponse;
use Illuminate\Support\Facades\Validator;


class LockScreenController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->middleware('auth')->only(['lock']);

        $this->guard = $guard;

        \config_set('theme.cdata', [
            'title' => 'Lock-screen',

            'description' => 'Lock-screen',

        ]);
    }

    /**
     *
     * Lock Screen
     *
     */
    public function lock(Request $request)
    {
        $email = auth()->user()->email;

        $this->guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        if ($email) Session::put('lock-screen', $email);
        Session::put('lock-screen-url', \back_url());
        return app(LogoutResponse::class);
    }
    /**
     *
     * Lock Screen
     *
     */
    public function unlock()
    {
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        if (!Session::exists('lock-screen')) return \redirect()->route('admin.dashboard');
        return \view('auth.lock-screen-password-confirm', ['email' => Session::get('lock-screen')]);
    }


    public function unlockScreen(Request $request)
    {
        $email = Session::get('lock-screen');
        Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ])->after(function ($validator) use ($email, $request) {
            $user = User::where('email', $email)->first();
            if ($user) {
                if (!isset($request['password']) || !Hash::check($request['password'], $user->password)) {
                    $validator->errors()->add('password', __('The provided password does not match your current password.'));
                } else {
                    $this->guard->login($user);
                    Session::forget('lock-screen');
                }
            } else {
                Session::forget('lock-screen');
            }
        })->validate();

        if (Session::exists('lock-screen-url')) return \redirect(Session::get('lock-screen-url'));

        return \redirect()->route('admin.dashboard');
    }
}
