<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// routes/web.php

Route::post('/verify', [AuthController::class, 'verify'])->name('verify');
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
Route::resource('procurements', ProcurementController::class);
Route::get('/procurements/{id}', 'ProcurementController@show')->name('procurements.show');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Supplier routes
Route::get('/supplier/details', [SupplierController::class, 'showDetails'])->name('supplier.details');
Route::resource('suppliers', SupplierController::class);

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__.'/auth.php';