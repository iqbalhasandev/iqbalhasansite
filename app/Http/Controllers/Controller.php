<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, SEOToolsTrait;

    public function __construct()
    {
        config_set('theme.cdata.back', \back_url());
        config_set('theme.cdata.breadcrumb', [
            [
                'name' => 'Dashboard',
                'link' => \route('admin.dashboard'),
            ]
        ]);
    }
}
