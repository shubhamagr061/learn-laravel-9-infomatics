<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/about', function () {
    return view('about');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('/home/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product-create');
Route::post('/home/product/create', [App\Http\Controllers\ProductController::class, 'store'])->name('product-store');
Route::get('/home/product/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('product-edit');
Route::post('/home/product/edit', [App\Http\Controllers\ProductController::class, 'update'])->name('product-update');
Route::delete('/home/product/delete', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product-destroy');