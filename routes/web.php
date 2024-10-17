<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValueController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/about', [UserController::class, 'about'])->name('about');

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::prefix('/datas')->name('datas.')->group(function () {
    Route::get('/home', [DataController::class, 'create'])->name('create');
    Route::post('/store', [DataController::class, 'store'])->name('store');
    Route::get('/', [DataController::class, 'index'])->name('index');
    Route::get('/{id}', [DataController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [DataController::class, 'update'])->name('update');
    Route::delete('/{id}', [DataController::class, 'destroy'])->name('delete');
});

Route::prefix('/values')->name('values.')->group(function () {
    Route::get('/home', [ValueController::class, 'create'])->name('create');
    Route::post('/store', [ValueController::class, 'store'])->name('store');
    Route::get('/', [ValueController::class, 'index'])->name('index');
    Route::get('/{id}', [ValueController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [ValueController::class, 'update'])->name('update');
    Route::delete('/{id}', [ValueController::class, 'destroy'])->name('delete');
});

    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'register')->name('register');
        Route::post('/register', 'registerSave')->name('register.save');

        Route::get('login', 'login')->name('login');
        Route::post('login', 'loginAction')->name('login.action');
    });