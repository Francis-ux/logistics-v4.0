<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\ShipmentController;
use App\Http\Controllers\Dashboard\Admin\DashboardController;
use App\Http\Controllers\Dashboard\Admin\ShipmentLocationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('cargo/tracking/details/{shipment}', [ShipmentController::class, 'index'])->name('cargo.tracking.details');

Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::post('login', [AuthenticatedSessionController::class, 'store']);

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('admin.dashboard');

    Route::get('/shipments', [ShipmentController::class, 'index'])->name('admin.shipment.index');
    Route::get('/shipment/create', [ShipmentController::class, 'create'])->name('admin.shipment.create');
    Route::post('/shipment', [ShipmentController::class, 'store'])->name('admin.shipment.store');
    Route::get('/shipment/{shipment}', [ShipmentController::class, 'show'])->name('admin.shipment.show');
    Route::get('/shipment/{shipment}/edit', [ShipmentController::class, 'edit'])->name('admin.shipment.edit');
    Route::put('/shipment/{shipment}', [ShipmentController::class, 'update'])->name('admin.shipment.update');
    Route::delete('/shipment/{shipment}', [ShipmentController::class, 'destroy'])->name('admin.shipment.destroy');
    Route::get('/shipment/{shipment}/download', [ShipmentController::class, 'download'])->name('admin.shipment.download');

    Route::put('/shipment/location/{shipment}', [ShipmentLocationController::class, 'update'])->name('admin.shipment.location.update');
    Route::delete('/shipment/location/{shipmentLocation}', [ShipmentLocationController::class, 'destroy'])->name('admin.shipment.location.destroy');
});
