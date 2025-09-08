<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\ShipmentController;
use App\Http\Controllers\Dashboard\Admin\DashboardController;
use App\Http\Controllers\Dashboard\Admin\ShipmentLocationController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('admin.dashboard');

    Route::get('/shipments', [ShipmentController::class, 'index'])->name('admin.shipment.index');
    Route::get('/shipment/create', [ShipmentController::class, 'create'])->name('admin.shipment.create');
    Route::post('/shipment/store', [ShipmentController::class, 'store'])->name('admin.shipment.store');
    Route::get('/shipment/{shipment}/show', [ShipmentController::class, 'show'])->name('admin.shipment.show');
    Route::get('/shipment/{shipment}/edit', [ShipmentController::class, 'edit'])->name('admin.shipment.edit');
    Route::put('/shipment/{shipment}/update', [ShipmentController::class, 'update'])->name('admin.shipment.update');
    Route::delete('/shipment/{shipment}/destroy', [ShipmentController::class, 'destroy'])->name('admin.shipment.destroy');
    Route::get('/shipment/{shipment}/download', [ShipmentController::class, 'download'])->name('admin.shipment.download');

    Route::put('/shipment/location/{shipmentLocation}/update', [ShipmentLocationController::class, 'update'])->name('admin.shipment.location.update');
    Route::delete('/shipment/location/{shipmentLocation}/destroy', [ShipmentLocationController::class, 'destroy'])->name('admin.shipment.location.destroy');
});
