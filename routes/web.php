<?php

use App\Models\UserStatus;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\LockScreenController;
use App\Http\Controllers\UserStatusController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Portfolio\PortfolioSkillController;
use App\Http\Controllers\Portfolio\PortfolioClientController;
use App\Http\Controllers\Portfolio\PortfolioGalleryController;
use App\Http\Controllers\Portfolio\PortfolioServiceController;
use App\Http\Controllers\Portfolio\PortfolioEducationController;
use App\Http\Controllers\Portfolio\PortfolioExpertiseController;
use App\Http\Controllers\Portfolio\PortfolioTestimonialController;

require_once __DIR__ . '/jetstream.php';
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

Route::get('/', [DashboardController::class, 'redirect']);


Route::get('/test', function () {
    // return Config::set('auth.password_timeout', false);
    // Session::put('lock-screen', auth()->user()->email);

    // Session::put('lock-screen', 'hello');
    // return  Session::get('lock-screen');
    Session::forget('lock-screen');
});


/**
 *
 *
 * ----------------------------------------------------------
 *                  Admin Route Group
 * ----------------------------------------------------------
 *
 */
Route::prefix('admin')->group(function () {
    /**
     *
     *
     * ----------------------------------------------------------
     *                   Lock Management
     * ----------------------------------------------------------
     *
     */
    Route::prefix('lock-screen')->group(function () {
        Route::get('/', [LockScreenController::class, 'lock'])->name('admin.lock-screen');
        Route::get('/security-checkpoint', [LockScreenController::class, 'unlock'])->name('admin.lock-screen.unlock.view');
        Route::post('/security-checkpoint', [LockScreenController::class, 'unlockScreen'])->name('admin.lock-screen.unlock');
    });



    /**
     *
     *
     * ----------------------------------------------------------
     *                  Auth Middleware Group
     * ----------------------------------------------------------
     *
     */
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/', [DashboardController::class, 'redirect'])->name('admin.redirect');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


        /**
         *
         *
         * ----------------------------------------------------------
         *                   User Management
         * ----------------------------------------------------------
         *
         */


        Route::prefix('user')->group(function () {


            /**
             *
             *
             * ----------------------------------------------------------
             *                   User Status Management
             * ----------------------------------------------------------
             *
             */
            Route::prefix('status')->middleware(['permission:user_status_management'])->group(function () {
                Route::get('/', [UserStatusController::class, 'index'])->name('admin.user-status.index');
                Route::get('/create', [UserStatusController::class, 'create'])->name('admin.user-status.create');
                Route::post('/create', [UserStatusController::class, 'store'])->name('admin.user-status.store');
                Route::get('/{userStatus}/edit', [UserStatusController::class, 'edit'])->name('admin.user-status.edit');
                Route::put('/{userStatus}/edit', [UserStatusController::class, 'update'])->name('admin.user-status.update');
                Route::delete('/{userStatus}/delete', [UserStatusController::class, 'destroy'])->name('admin.user-status.delete');
            }); //end role route group
            /**
             *
             *
             * ----------------------------------------------------------
             *                   Role Management
             * ----------------------------------------------------------
             *
             */
            Route::prefix('role')->group(function () {
                Route::get('/', [RoleController::class, 'index'])->name('admin.role.index');
                Route::get('/create', [RoleController::class, 'create'])->name('admin.role.create');
                Route::post('/create', [RoleController::class, 'store'])->name('admin.role.store');
                Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('admin.role.edit');
                Route::put('/{role}/edit', [RoleController::class, 'update'])->name('admin.role.update');
                Route::delete('/{role}/delete', [RoleController::class, 'destroy'])->name('admin.role.delete');
            }); //end role route group

            /**
             *
             *
             * ----------------------------------------------------------
             *                   Permission Management
             * ----------------------------------------------------------
             *
             */
            Route::prefix('/permission')->group(function () {
                Route::get('/', [PermissionController::class, 'index'])->name('admin.permission.index');
                Route::get('/create', [PermissionController::class, 'create'])->name('admin.permission.create');
                Route::post('/create', [PermissionController::class, 'store'])->name('admin.permission.store');
                Route::get('/{permission}', [UserController::class, 'show'])->name('admin.permission.show');
                Route::get('/{permission}/edit', [PermissionController::class, 'edit'])->name('admin.permission.edit');
                Route::put('/{permission}/edit', [PermissionController::class, 'update'])->name('admin.permission.update');
                Route::delete('/{permission}/delete', [PermissionController::class, 'destroy'])->name('admin.permission.delete');
            }); //end permission route group

            /**
             *
             *
             * ----------------------------------------------------------
             *                   Profile Management
             * ----------------------------------------------------------
             *
             */
            Route::prefix('profile')->group(function () {
                Route::get('/', [UserController::class, 'profile'])->name('admin.user.profile');
                Route::get('/setting', [UserController::class, 'setting'])->name('admin.user.profile.settings');
                Route::post('/setting', [UserController::class, 'update_setting'])->name('admin.user.profile.settings.update');
            });



            Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
            Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
            Route::post('/create', [UserController::class, 'store'])->name('admin.user.store');
            Route::get('/{user}', [UserController::class, 'show'])->name('admin.user.show');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
            Route::put('/{user}/edit', [UserController::class, 'update'])->name('admin.user.update');
            Route::delete('/{user}/delete', [UserController::class, 'destroy'])->name('admin.user.delete');
            Route::post('{user}/status-update', [UserController::class, 'statusUpdate'])->name('user.statusUpdate');
        }); //end user route group

        /**
         *
         *
         * ----------------------------------------------------------
         *                   Portfolio Management
         * ----------------------------------------------------------
         *
         */
        Route::prefix('portfolio')->group(function () {

            /**
             *
             *
             * ----------------------------------------------------------
             *                   Client Management
             * ----------------------------------------------------------
             *
             */
            Route::prefix('/client')->group(function () {
                Route::get('/', [PortfolioClientController::class, 'index'])->name('admin.portfolio.client.index');
                Route::get('/create', [PortfolioClientController::class, 'create'])->name('admin.portfolio.client.create');
                Route::post('/create', [PortfolioClientController::class, 'store'])->name('admin.portfolio.client.store');
                Route::get('/{portfolioClient}', [PortfolioClientController::class, 'show'])->name('admin.portfolio.client.show');
                Route::get('/{portfolioClient}/edit', [PortfolioClientController::class, 'edit'])->name('admin.portfolio.client.edit');
                Route::put('/{portfolioClient}/edit', [PortfolioClientController::class, 'update'])->name('admin.portfolio.client.update');
                Route::delete('/{portfolioClient}/delete', [PortfolioClientController::class, 'destroy'])->name('admin.portfolio.client.delete');
            }); //end portfolio client route group

            /**
             *
             *
             * ----------------------------------------------------------
             *                   Education Management
             * ----------------------------------------------------------
             *
             */
            Route::prefix('/education')->group(function () {
                Route::get('/', [PortfolioEducationController::class, 'index'])->name('admin.portfolio.education.index');
                Route::get('/create', [PortfolioEducationController::class, 'create'])->name('admin.portfolio.education.create');
                Route::post('/create', [PortfolioEducationController::class, 'store'])->name('admin.portfolio.education.store');
                Route::get('/{portfolioEducation}', [PortfolioEducationController::class, 'show'])->name('admin.portfolio.education.show');
                Route::get('/{portfolioEducation}/edit', [PortfolioEducationController::class, 'edit'])->name('admin.portfolio.education.edit');
                Route::put('/{portfolioEducation}/edit', [PortfolioEducationController::class, 'update'])->name('admin.portfolio.education.update');
                Route::delete('/{portfolioEducation}/delete', [PortfolioEducationController::class, 'destroy'])->name('admin.portfolio.education.delete');
            }); //end portfolio education route group

            /**
             *
             *
             * ----------------------------------------------------------
             *                   Expertise Management
             * ----------------------------------------------------------
             *
             */
            Route::prefix('/expertise')->group(function () {
                Route::get('/', [PortfolioExpertiseController::class, 'index'])->name('admin.portfolio.expertise.index');
                Route::get('/create', [PortfolioExpertiseController::class, 'create'])->name('admin.portfolio.expertise.create');
                Route::post('/create', [PortfolioExpertiseController::class, 'store'])->name('admin.portfolio.expertise.store');
                Route::get('/{portfolioExpertise}', [PortfolioExpertiseController::class, 'show'])->name('admin.portfolio.expertise.show');
                Route::get('/{portfolioExpertise}/edit', [PortfolioExpertiseController::class, 'edit'])->name('admin.portfolio.expertise.edit');
                Route::put('/{portfolioExpertise}/edit', [PortfolioExpertiseController::class, 'update'])->name('admin.portfolio.expertise.update');
                Route::delete('/{portfolioExpertise}/delete', [PortfolioExpertiseController::class, 'destroy'])->name('admin.portfolio.expertise.delete');
            }); //end portfolio expertise route group

            /**
             *
             *
             * ----------------------------------------------------------
             *                   Expertise Management
             * ----------------------------------------------------------
             *
             */
            Route::prefix('/gallery')->group(function () {
                Route::get('/', [PortfolioGalleryController::class, 'index'])->name('admin.portfolio.gallery.index');
                Route::get('/create', [PortfolioGalleryController::class, 'create'])->name('admin.portfolio.gallery.create');
                Route::post('/create', [PortfolioGalleryController::class, 'store'])->name('admin.portfolio.gallery.store');
                Route::get('/{portfolioGallery}', [PortfolioGalleryController::class, 'show'])->name('admin.portfolio.gallery.show');
                Route::get('/{portfolioGallery}/edit', [PortfolioGalleryController::class, 'edit'])->name('admin.portfolio.gallery.edit');
                Route::put('/{portfolioGallery}/edit', [PortfolioGalleryController::class, 'update'])->name('admin.portfolio.gallery.update');
                Route::delete('/{portfolioGallery}/delete', [PortfolioGalleryController::class, 'destroy'])->name('admin.portfolio.gallery.delete');
            }); //end portfolio expertise route group
            /**
             *
             *
             * ----------------------------------------------------------
             *                   Service Management
             * ----------------------------------------------------------
             *
             */
            Route::prefix('/service')->group(function () {
                Route::get('/', [PortfolioServiceController::class, 'index'])->name('admin.portfolio.service.index');
                Route::get('/create', [PortfolioServiceController::class, 'create'])->name('admin.portfolio.service.create');
                Route::post('/create', [PortfolioServiceController::class, 'store'])->name('admin.portfolio.service.store');
                Route::get('/{portfolioService}', [PortfolioServiceController::class, 'show'])->name('admin.portfolio.service.show');
                Route::get('/{portfolioService}/edit', [PortfolioServiceController::class, 'edit'])->name('admin.portfolio.service.edit');
                Route::put('/{portfolioService}/edit', [PortfolioServiceController::class, 'update'])->name('admin.portfolio.service.update');
                Route::delete('/{portfolioService}/delete', [PortfolioServiceController::class, 'destroy'])->name('admin.portfolio.service.delete');
            }); //end portfolio expertise route group
            /**
             *
             *
             * ----------------------------------------------------------
             *                   Skill Management
             * ----------------------------------------------------------
             *
             */
            Route::prefix('/skill')->group(function () {
                Route::get('/', [PortfolioSkillController::class, 'index'])->name('admin.portfolio.skill.index');
                Route::get('/create', [PortfolioSkillController::class, 'create'])->name('admin.portfolio.skill.create');
                Route::post('/create', [PortfolioSkillController::class, 'store'])->name('admin.portfolio.skill.store');
                Route::get('/{portfolioSkill}', [PortfolioSkillController::class, 'show'])->name('admin.portfolio.skill.show');
                Route::get('/{portfolioSkill}/edit', [PortfolioSkillController::class, 'edit'])->name('admin.portfolio.skill.edit');
                Route::put('/{portfolioSkill}/edit', [PortfolioSkillController::class, 'update'])->name('admin.portfolio.skill.update');
                Route::delete('/{portfolioSkill}/delete', [PortfolioSkillController::class, 'destroy'])->name('admin.portfolio.skill.delete');
            }); //end portfolio skill route group
            /**
             *
             *
             * ----------------------------------------------------------
             *                   Testimonial Management
             * ----------------------------------------------------------
             *
             */
            Route::prefix('/testimonial')->group(function () {
                Route::get('/', [PortfolioTestimonialController::class, 'index'])->name('admin.portfolio.testimonial.index');
                Route::get('/create', [PortfolioTestimonialController::class, 'create'])->name('admin.portfolio.testimonial.create');
                Route::post('/create', [PortfolioTestimonialController::class, 'store'])->name('admin.portfolio.testimonial.store');
                Route::get('/{portfolioTestimonial}', [PortfolioTestimonialController::class, 'show'])->name('admin.portfolio.testimonial.show');
                Route::get('/{portfolioTestimonial}/edit', [PortfolioTestimonialController::class, 'edit'])->name('admin.portfolio.testimonial.edit');
                Route::put('/{portfolioTestimonial}/edit', [PortfolioTestimonialController::class, 'update'])->name('admin.portfolio.testimonial.update');
                Route::delete('/{portfolioTestimonial}/delete', [PortfolioTestimonialController::class, 'destroy'])->name('admin.portfolio.testimonial.delete');
            }); //end portfolio testimonial route group

        });




        /**
         *
         *
         * ----------------------------------------------------------
         *                   Settings Management
         * ----------------------------------------------------------
         *
         */
        Route::prefix('settings')->group(function () {
            Route::get('/', [SettingController::class, 'index'])->name('admin.settings.index');
            Route::get('/{setting}/move-up', [SettingController::class, 'move_up'])->name('admin.settings.moveUp');
            Route::get('/{setting}/move-down', [SettingController::class, 'move_down'])->name('admin.settings.moveDown');
            Route::post('/', [SettingController::class, 'store'])->name('admin.settings.store');
            Route::put('/', [SettingController::class, 'update'])->name('admin.settings.update');
            Route::delete('/{setting}/delete', [SettingController::class, 'destroy'])->name('admin.settings.delete');
            Route::get('/{setting}/unset-value', [SettingController::class, 'unsetValue'])->name('admin.settings.unsetValue');
        }); //end settings group

    }); //end auth route group
});//end admin route group
