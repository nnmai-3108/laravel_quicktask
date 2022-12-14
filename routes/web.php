<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LangController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

//Cách 1: Dùng route resourse cho UserController
//Route::resource('users', UserController::class)->middleware('admin');

Route::prefix('users')->name('users.')->controller(UserController::class)->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::get('{id}', 'show')->name('show');
    Route::get('{id}/edit', 'edit')->name('edit');
    Route::post('', 'store')->name('store');
    Route::put('{id}', 'update')->name('update');
    Route::delete('{id}', 'destroy')->name('destroy');
});

//Cách 2: Viết rõ các route tương ứng với các func trong controller còn lại
Route::prefix('tasks')->name('tasks.')->controller(TaskController::class)->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('create/{user}', 'create')->name('create');
    Route::get('{task}', 'show')->name('show');
    Route::get('{task}/edit', 'edit')->name('edit');
    Route::post('{id}', 'store')->name('store');
    Route::put('{task}', 'update')->name('update');
    Route::delete('{task}', 'destroy')->name('destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('lang/{lang}',[LangController::class, 'changeLang'])->middleware('locale')->name('lang');

