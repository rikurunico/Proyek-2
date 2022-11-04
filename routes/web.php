<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DormitoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentLogController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect()->route('dashboard.index');
});

Route::get('/login', [LoginController::class, "index"])->middleware("guest")->name("login");
Route::post('/login', [LoginController::class, "store"])->name("login.store");

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, "logout"])->name("logout");
    Route::get('/dashboard', [DashboardController::class, "index"])->name("dashboard.index");
    Route::resource('/dashboard/rooms', RoomController::class);
    Route::resource('/dashboard/dormitory', DormitoryController::class);
    Route::resource('/dashboard/transactions', PaymentLogController::class);
    Route::resource('/dashboard/users', UserController::class);
});
