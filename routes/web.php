<?php

use App\Http\Controllers\Admin\Products\ProductController;
use App\Http\Controllers\Admin\UploadController;
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

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/', [MainController::class,'index'])->name('index');

    #Menu
    Route::prefix('menu')->name('menu.')->group(function(){
        Route::get('/', [MenuController::class,'index'])->name('index');
        Route::get('/add', [MenuController::class,'create'])->name('create');
        Route::post('/add/store', [MenuController::class,'store'])->name('store');
        Route::get('/edit/{id}', [MenuController::class,'edit'])->name('edit');
        Route::post('/update/{id}', [MenuController::class,'update'])->name('update');
        Route::delete('/destroy/{id}', [MenuController::class,'destroy'])->name('destroy');
    });

    #Product
    Route::prefix('product')->name('product.')->group(function(){
        Route::get('/', [ProductController::class,'index'])->name('index');
        Route::get('/add', [ProductController::class,'create'])->name('create');
        Route::post('/add/store', [ProductController::class,'store'])->name('store');
        Route::get('/edit/{id}', [ProductController::class,'edit'])->name('edit');
        Route::post('/update/{id}', [ProductController::class,'update'])->name('update');
        Route::delete('/destroy/{id}', [ProductController::class,'destroy'])->name('destroy');
    });

    #Upload
    Route::post('/upload/sevices',[UploadController::class,'store'])->name('upload.store');
    
});