<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ClientsController;

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

Auth::routes();
Route::get('/', [DashboardController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/clients', [ClientsController::class, 'index'])->name('clients');
Route::post('/clients/store', [ClientsController::class, 'store'])->name('clients.store');
Route::post('/clients/update/{id}', [ClientsController::class, 'update'])->name('clients.update');
Route::post('/clients/destroy/{id}', [ClientsController::class, 'destroy'])->name('clients.destroy');

Route::middleware(['auth', 'user-access:admin'])->group(function () {
	Route::get('/employees', [EmployeesController::class, 'index'])->name('employees');
	Route::post('/employees/store', [EmployeesController::class, 'store'])->name('employees.store');
	Route::post('/employees/update/{id}', [EmployeesController::class, 'update'])->name('employees.update');
	Route::post('/employees/destroy/{id}', [EmployeesController::class, 'destroy'])->name('employees.destroy');
});