<?php

use App\Models\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;

Auth::routes([
    'login' => true, // Registration Routes...
    'register' => true, // Registration Routes...
    'reset' => true, // Password Reset Routes...
    'verify' => true, // Email Verification Routes...
]);



Route::prefix('dashboard')->middleware(['auth', 'can:AdminUser'])->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');

    //SuperAdmin Routes
    Route::middleware('can:SuperAdmin')->group(function () {
        Route::get("/admin", [UserController::class, 'index'])->name("admin.index");
        Route::get("/admin/user", [UserController::class, 'user'])->name("admin.user");
        Route::get("/admin/create", [UserController::class, 'create'])->name("admin.create");
        Route::post("/admin", [UserController::class, 'store'])->name("admin.store");
        Route::get("/admin/edit/{id}", [UserController::class, 'edit'])->name("admin.edit");
        Route::post("/admin/update", [UserController::class, 'update'])->name("admin.update");
        Route::get("/admin/trash-list", [UserController::class, 'trash_list'])->name("admin.trash_list");
        Route::post("/admin/trash", [UserController::class, 'trash'])->name("admin.trash");
        Route::post("/admin/bulk-action", [UserController::class, 'bulk_action'])->name("admin.bulk_action");
        Route::get("/admin/change-password/{id}", [UserController::class, 'change_password'])->name("admin.change_password");
    });
    Route::middleware('can:update-user')->group(function () {
        Route::get("/profile/update", [UserController::class, 'profile_edit'])->name("profile.profile_update");
        Route::post("/profile/update", [UserController::class, 'profile_update'])->name("profile.update");
        Route::get("/profile/change-password", [UserController::class, 'changes_password'])->name("profile.change_password");
        Route::post("/admin/update-password", [UserController::class, 'update_password'])->name("admin.update_password");
    });
        //Category Routes
        Route::get("/category", [CategoryController::class, 'index'])->name("category.index");
        Route::get("/category/create", [CategoryController::class, 'create'])->name("category.create");
        Route::post("/category", [CategoryController::class, 'store'])->name("category.store");
        Route::get("/category/edit/{id}", [CategoryController::class, 'edit'])->name("category.edit");
        Route::post("/category/update", [CategoryController::class, 'update'])->name("category.update");
        Route::get("/category/trash-list", [CategoryController::class, 'trash_list'])->name("category.trash_list")->middleware('can:Admin');
        Route::post("/category/trash", [CategoryController::class, 'trash'])->name("category.trash")->middleware('can:Admin');
        Route::post("/category/bulk-action", [CategoryController::class, 'bulk_action'])->name("category.bulk_action")->middleware('can:Admin');

    Route::middleware(['can:AdminUser'])->group(function () {
        //Setting Routes
        Route::get('/setting', [SettingController::class, 'index'])->name('setting');
        Route::post('/setting-update', [SettingController::class, 'update'])->name('setting.update');
        //Blog Routes

        Route::get("/blog", [BlogController::class, 'index'])->name("blog.index");
        Route::get("/blog/inactive", [BlogController::class, 'inactive'])->name("blog.inactive");
        Route::get("/blog/create", [BlogController::class, 'create'])->name("blog.create");
        Route::post("/blog", [BlogController::class, 'store'])->name("blog.store");
        Route::get("/blog/edit/{id}", [BlogController::class, 'edit'])->name("blog.edit");
        Route::post("/blog/update", [BlogController::class, 'update'])->name("blog.update");

        Route::get("/blog/trash-list", [BlogController::class, 'trash_list'])->name("blog.trash_list")->middleware('can:Admin');
        Route::post("/blog/trash", [BlogController::class, 'trash'])->name("blog.trash")->middleware('can:Admin');
        Route::post("/blog/bulk-action", [BlogController::class, 'bulk_action'])->name("blog.bulk_action")->middleware('can:Admin');
    });


    Route::get('/dashboard/clear-log', function () {
        try {
            Artisan::call('log:clear');
            Artisan::call('cache:clear');
            Artisan::call('route:clear');
            Artisan::call('config:clear');
            Artisan::call('view:clear');
            Toastr::success('Log Cleared Successfully', 'Success');
            return redirect()->back();
        } catch (\Throwable $th) {
            Toastr::error('Some Error Occcurs', 'Danger');
            return redirect()->back();
        }
    })->name('clear_log');

    View::composer(['*'], function ($views) {
        $allSetting = Cache::rememberForever('setting', function () {
            return Setting::first();
        });
        $views->with('allSetting', $allSetting);
    });

});

