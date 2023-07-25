<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ChannelController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\TeamController;

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\HomeController;

use Laravel\Socialite\Facades\Socialite;

Route::get('/', [LoginController::class, 'index']);
Route::get('admin', [LoginController::class, 'index']);
Route::POST('admin', [LoginController::class, 'store']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/google/callback', function () {
    $user = Socialite::driver('google')->user();
    dd($user);
    // $user->token
});


// ajax
Route::group(['prefix'=>'ajax'],function(){
    Route::get('change_cate_lang/{id}', [AjaxController::class, 'change_cate_lang']);
    Route::get('change_team/{id}', [AjaxController::class, 'change_team']);
    
});


Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        // main
        Route::get('main', [MainController::class, 'index'])->name('admin');
        Route::get('project/export', [ProjectController::class, 'export']);

        Route::resource('channel',ChannelController::class);
        Route::resource('project',ProjectController::class);
        Route::resource('supplier',SupplierController::class);
        Route::resource('team',TeamController::class);
        Route::resource('task',TaskController::class);
        Route::POST('task/search', [TaskController::class, 'search']);
        Route::resource('users',UserController::class);
        Route::group(['prefix'=>'section'],function(){
            Route::get('index/{pid}', [SectionController::class, 'index']);
        });
    });
});

// home
// Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('about', [HomeController::class, 'about'])->name('about');
// Route::get('contact', [HomeController::class, 'contact'])->name('contact');
// Route::get('{slug}', [HomeController::class, 'category']);
// Route::get('{catslug}/{slug}', [HomeController::class, 'post']);
