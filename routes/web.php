<?php

use App\Http\Controllers\ApproveBookingController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardHomeController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\VehicleController;

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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardHomeController::class, 'index'])->name('dashboard.home');
        Route::get('/booking/export', [BookingController::class, 'export'])->name('booking.export');
        Route::get('/booking-chart', [BookingController::class, 'showChart']);
        Route::resource('user', UserController::class);
        Route::resource('vehicle', VehicleController::class);
        Route::resource('driver', DriverController::class);
        Route::resource('maintenance', MaintenanceController::class);
        Route::resource('booking', BookingController::class);
    });
});
Route::middleware(['auth', 'verified', 'role:approver1|approver2'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('approve-booking', [ApproveBookingController::class, 'index'])->name('approve-booking.index');
        Route::post('approve-booking/{booking}', [ApproveBookingController::class, 'approve'])->name('booking.approve');
        Route::post('reject-booking/{booking}', [ApproveBookingController::class, 'reject'])->name('booking.reject');
    });
});
