<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\ShipmentController;
use App\Http\Controllers\Dashboard\Admin\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('admin.dashboard');

    Route::get('/shipments', [ShipmentController::class, 'index'])->name('admin.shipment.index');
    Route::get('/shipment/create', [ShipmentController::class, 'create'])->name('admin.shipment.create');
    Route::post('/shipment', [ShipmentController::class, 'store'])->name('admin.shipment.store');
    Route::get('/shipment/{shipment}/edit', [ShipmentController::class, 'edit'])->name('admin.shipment.edit');
    Route::put('/shipment/{shipment}', [ShipmentController::class, 'update'])->name('admin.shipment.update');
    Route::delete('/shipment/{shipment}', [ShipmentController::class, 'destroy'])->name('admin.shipment.destroy');
});
