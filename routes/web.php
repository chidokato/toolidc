<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ChannelController;
use App\Http\Controllers\Admin\OfficeController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\AllocationController;

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExcelImportController;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', [LoginController::class, 'index']);
Route::get('admin', [LoginController::class, 'index'])->name('login');
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
    Route::get('cty/{id}', [AjaxController::class, 'cty']);
    Route::get('san/{id}', [AjaxController::class, 'san']);
    
});

Route::post('/import-excel', [ExcelImportController::class, 'importExcel'])->name('import.excel');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        // main
        Route::get('main', [MainController::class, 'index'])->name('admin');
        Route::post('generate', [MainController::class, 'generateImage']);


        Route::get('project/export', [ProjectController::class, 'export']);

        Route::resource('office',OfficeController::class);

        Route::resource('channel',ChannelController::class);
        
        Route::resource('allocation',AllocationController::class);
        Route::post('allocation/export', [AllocationController::class, 'export'])->name('allocation.export');

        Route::resource('project',ProjectController::class);
        Route::resource('supplier',SupplierController::class);
        Route::resource('team',TeamController::class);
        Route::resource('task',TaskController::class);
        Route::POST('task/search', [TaskController::class, 'search']);
        Route::POST('task/destroy', [TaskController::class, 'destroy'])->name('task.destroy');
        Route::resource('users',UserController::class);
        Route::group(['prefix'=>'section'],function(){
            Route::get('index/{pid}', [SectionController::class, 'index']);
        });

        Route::post('team/upfile', [TeamController::class, 'upfile'])->name('team.upfile');
        Route::post('project/upfile', [ProjectController::class, 'upfile'])->name('project.upfile');
        Route::post('users/upfile', [UserController::class, 'upfile'])->name('users.upfile');
        Route::post('task/upfile', [TaskController::class, 'upfile'])->name('task.upfile');
        
    });
});

// home
// Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('about', [HomeController::class, 'about'])->name('about');
// Route::get('contact', [HomeController::class, 'contact'])->name('contact');
// Route::get('{slug}', [HomeController::class, 'category']);
// Route::get('{catslug}/{slug}', [HomeController::class, 'post']);
