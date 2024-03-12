<?php

use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class,'index'] )->name('login');
Route::get('/logout', [LoginController::class,'logout'] )->name('logout');
Route::post('/login/store', [LoginController::class,'store'] )->name('login.store');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [MainController::class,'index'] )->name('admin.index');
    Route::prefix('menu')->group(function(){
        Route::get('/', [MenuController::class,'index'] )->name('admin.menu.index');
        Route::get('/add', [MenuController::class,'create'] )->name('admin.menu.create');
        Route::post('/add/store', [MenuController::class,'store'] )->name('admin.menu.stote');
        Route::get('/edit/{id}', [MenuController::class,'edit'] )->name('admin.menu.edit');
        Route::post('/update/{id}', [MenuController::class,'update'] )->name('admin.menu.update');
        Route::delete('/destroy/{id}', [MenuController::class,'destroy'] )->name('admin.menu.destroy');
    });
});