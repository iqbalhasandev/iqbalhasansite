<?php

use Illuminate\Http\Request;
use App\Models\Admin\VisitorCounter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BTEB\ResultController;
use App\Http\Controllers\Api\VisitorCounterController;
use App\Http\Controllers\Admin\BTEB\BTEBResultController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::domain(config('domain.api'))->group(function () {
    Route::get('/bteb-get-result', [BTEBResultController::class, 'resultCheckApi']);
    Route::get('/bteb-get-all-session', [BTEBResultController::class, 'getAllSession']);

    Route::prefix('visitor')->group(function () {
        Route::get('/get', [VisitorCounterController::class, 'index'])->name('visitor.get');
        Route::get('/count', [VisitorCounterController::class, 'count'])->name('visitor.count');
        Route::get('/count-unique-visitor', [VisitorCounterController::class, 'countUniqueVisitor'])->name('visitor.countUniqueVisitor');
        Route::get('/count-unique-visitor-and-svg', [VisitorCounterController::class, 'countUniqueVisitorAndSvg'])->name('visitor.countUniqueVisitorAndSvg');
        Route::get('/count-and-svg', [VisitorCounterController::class, 'countAndSvg'])->name('visitor.countAndSvg');
    });

    Route::prefix('bteb')->group(function () {
        Route::post('/get-result/individual', [ResultController::class, 'searchIndividual'])->name('bteb.result.search.individual');
        Route::post('/get-result/group', [ResultController::class, 'searchGroup'])->name('bteb.result.search.group');
    });
});
