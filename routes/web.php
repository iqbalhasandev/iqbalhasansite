<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ShortLinkController;
use App\Http\Controllers\Portfolio\PortfolioController;
use App\Http\Controllers\Admin\BTEB\BTEBResultController;
use App\Http\Controllers\Portfolio\PageBuilderController;


require_once __DIR__ . '/jetstream.php';
require_once __DIR__ . '/admin.php';
require_once __DIR__ . '/portfolio.php';
require_once __DIR__ . '/apps.php';
require_once __DIR__ . '/bteb.php';
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//Short Link
Route::get('s/{shortLink}', [ShortLinkController::class, 'redirect'])->name('short.link.redirect');


Route::get('/test', function () {
    //     // return Config::set('auth.password_timeout', false);
    //     // Session::put('lock-screen', auth()->user()->email);

    //     // Session::put('lock-screen', 'hello');
    //     // return  Session::get('lock-screen');
    //     Session::forget('lock-screen');
});
