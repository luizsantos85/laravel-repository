<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::any('categories/search', [CategoryController::class, 'search'])->name('categorySearch');
    Route::resource('categories', CategoryController::class);
    Route::any('products/search', [ProductController::class, 'search'])->name('productSearch');
    Route::resource('products', ProductController::class);
});

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});



