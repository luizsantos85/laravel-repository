<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Site\SiteController;

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/', [DashboardController::class,'index'])->name('admin');

    Route::any('categories/search', [CategoryController::class, 'search'])->name('categorySearch');
    Route::resource('categories', CategoryController::class);
    Route::any('products/search', [ProductController::class, 'search'])->name('productSearch');
    Route::resource('products', ProductController::class);
});

Route::get('/', [SiteController::class,'index'])->name('site.home');
Auth::routes(['register' => false]);



