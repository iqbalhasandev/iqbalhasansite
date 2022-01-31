<?php

namespace App;

use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

/**
 *
 *
 * ----------------------------------------------------------
 * App Subdomain Group
 * ----------------------------------------------------------
 *
 */
Route::domain(config('domain.apps'))->group(function () {
    Route::get('/bteb-result', [RedirectController::class, 'btebResultRedirect']);
});
