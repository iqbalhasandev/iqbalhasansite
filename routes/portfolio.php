<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\Portfolio\PortfolioController;
use App\Http\Controllers\Portfolio\PageBuilderController;

/**
 *
 *
 * ----------------------------------------------------------
 * portfolio Subdomain Group
 * ----------------------------------------------------------
 *
 */
Route::domain(config('domain.portfolio'))->group(function () {
    Route::get('/', [PortfolioController::class, 'index'])->name('portfolio');
    Route::post('/contact-submit', [PortfolioController::class, 'contactStore'])->name('portfolio.contact.store');
    Route::get('faq', [PortfolioController::class, 'faq'])->name('portfolio.faq');
    Route::get('report-issue', [PortfolioController::class, 'reportIssue'])->name('portfolio.report-issue');
    Route::post('report-issue', [PortfolioController::class, 'reportIssueStore'])->name('portfolio.report-issue.store');
    Route::get('page/{pageBuilder}', [PageBuilderController::class, 'show'])->name('portfolio.page-builder.show');
});


Route::domain(config('domain.www'))->group(function () {
    Route::get('/', [PortfolioController::class, 'index']);
    Route::post('/contact-submit', [PortfolioController::class, 'contactStore']);
    Route::get('faq', [PortfolioController::class, 'faq']);
    Route::get('report-issue', [PortfolioController::class, 'reportIssue']);
    Route::post('report-issue', [PortfolioController::class, 'reportIssueStore']);
    Route::get('page/{pageBuilder}', [PageBuilderController::class, 'show']);
});
