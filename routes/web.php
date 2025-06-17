<?php
use App\Http\Controllers\Authentication\AuthController;
use App\Http\Controllers\Backend\Dashboard\DashboardController;

use Illuminate\Support\Facades\Route;

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

Route::get('register',[AuthController::class,'showRegisterForm'])->name('register');
Route::get('user/login',[AuthController::class,'showLoginForm'])->name('showlogin');

Route::post('/auth/register', [AuthController::class, 'register'])->name('handleregister');
Route::post('login',[AuthController::class,'login'])->name('login.process');
Route::post('logout',[AuthController::class,'logout'])->name('logout');

Route::get('user/dashboard', [AuthController::class, 'show'])
    ->name('user.dashboard')
    ->middleware('check_role:client');
