<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LoyaltyProgramController;
use App\Http\Controllers\TableReservationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WorkTimeController;
use App\Http\Controllers\CoffeeMenuController;
use App\Http\Controllers\OrderController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('customers', CustomerController::class);
    Route::resource('inventories', InventoryController::class);
    Route::resource('loyalty_programs', LoyaltyProgramController::class);
    Route::resource('table_reservations', TableReservationController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('work_times', WorkTimeController::class);
    Route::resource('coffee_menus', CoffeeMenuController::class);
    Route::resource('orders', OrderController::class);
});