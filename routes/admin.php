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

Route::get('backend/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard.index');
Route::get('backend/category', [CategoryController::class, 'index'])->name('backend.category.index');
Route::get('backend/product', [ProductController::class, 'index'])->name('backend.product.index');
route::get('backend/customer',[CustomerController::class,'index'])->name('backend.customer.index');