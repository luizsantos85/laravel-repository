<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::any('/admin/categories/search', [CategoryController::class,'search'])->name('categorySearch');
Route::resource('/admin/categories', CategoryController::class);
Route::any('/admin/products/search', [ProductController::class,'search'])->name('productSearch');
Route::resource('/admin/products', ProductController::class);
