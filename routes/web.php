<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return inertia('App');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('blog', [BlogController::class,'index']);
// Route::get('blog/create', [BlogController::class,'create']);
// Route::post('blog/store', [BlogController::class,'store']);



Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    // Route::resource('blogs', BlogController::class);
    // Route::resource('blog', BlogController::class);
});


// BLOG


Route::get('blogs', [BlogController::class, 'index'])->name('blogs')->middleware('auth');

Route::get('blogs/create', [BlogController::class, 'create'])->name('blogs.create')->middleware('auth');

Route::post('blogs', [BlogController::class, 'store'])->name('blogs.store')->middleware('auth');