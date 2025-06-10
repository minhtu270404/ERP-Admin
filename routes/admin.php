<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('backend/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard');
Route::get('backend/category', [CategoryController::class, 'index'])->name('backend.category');
Route::get('backend/product', [ProductController::class, 'index'])->name('backend.product');
Route::get('backend/customer', [CustomerController::class, 'index'])->name('backend.customer');
Route::get('backend/category/create', [CategoryController::class, 'create'])->name('backend.category.create');
Route::get('backend/product/create', [ProductController::class, 'create'])->name('backend.product.create');
Route::get('backend/customer/create', [CustomerController::class, 'create'])->name('backend.customer.create');

Route::post('backend/category/store', [CategoryController::class, 'store'])->name('backend.category.store');
Route::post('backend/product/store', [ProductController::class, 'store'])->name('backend.product.store');

Route::get('backend/product/edit/{id}', [ProductController::class, 'edit'])->name('backend.product.edit');
Route::post('backend/product/update/{id}', [ProductController::class, 'update'])->name('backend.product.update');

Route::get('backend/category/edit/{id}', [CategoryController::class, 'edit'])->name('backend.category.edit');
Route::post('backend/category/update/{id}', [CategoryController::class, 'update'])->name('backend.category.update');
