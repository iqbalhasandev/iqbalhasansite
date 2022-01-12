<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    /**
     * Middleware
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        \config_set('theme.cdata', [
            'title' => 'Dashboard',
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
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
            'description' => 'Dashboard',

        ]);
        // seo
        $this->seo()->setTitle(config('theme.cdata.title'));
        $this->seo()->setDescription(\config('theme.cdata.description'));

        return view('pages.admin.dashboard');
    }

    /**
     *
     *
     * return Redirect Url
     *
     *
     */
    public function redirect()
    {
        return \redirect()->route('admin.dashboard');
    }
}
