<?php

namespace App;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BTEB\BTEBResultController;

/**
 *
 *
 * ----------------------------------------------------------
 * bteb Subdomain Group
 * ----------------------------------------------------------
 *
 */
Route::domain(config('domain.bteb'))->group(function () {
    Route::get('/', [BTEBResultController::class, 'show'])->name('bteb-result.show');
    Route::post('/', [BTEBResultController::class, 'resultCheck'])->name('bteb-result.result');
    Route::get('/download', [BTEBResultController::class, 'downloadResult'])->name('bteb-result.result.download');
});
