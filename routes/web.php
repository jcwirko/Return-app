<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class,'index'])->name('home');

Route::get('/products/deleted', [ProductController::class, 'allDeleted'])->name('products.deleted');
Route::post('/products/restore/{id}', [ProductController::class, 'restore'])->name('products.restore');
Route::resource('/products', ProductController::class);
