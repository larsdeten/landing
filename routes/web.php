<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

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
Route::get('/admin/{num}', [AdminController::class, 'index']);
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/', [PagesController::class, 'index'])->name('index');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('login', [AuthController::class, 'loginpage'])->name('loginpage');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/{page}', [PagesController::class, 'index']);
