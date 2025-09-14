<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Master\AdminController;
use App\Http\Controllers\Dashboard\Admin\ShipmentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Dashboard\Admin\DashboardController;
use App\Http\Controllers\Dashboard\Admin\ShipmentLocationController;
use App\Http\Controllers\Dashboard\Master\DashboardController as MasterDashboardController;
use App\Http\Controllers\Frontend\TrackingController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController;

Route::get('/', HomeController::class)->name('home');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::get('/tracking', [TrackingController::class, 'index'])->name('tracking.index');
Route::post('/tracking/store', [TrackingController::class, 'store'])->name('tracking.store');
Route::get('/tracking/{shipment}', [TrackingController::class, 'show'])->name('tracking.show');

Route::middleware('guestUser')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

Route::middleware('admin')->prefix('admin')->group(function () {
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

Route::middleware('master')->prefix('master')->group(function () {
    Route::get('/dashboard', MasterDashboardController::class)->name('master.dashboard');

    Route::get('/admins', [AdminController::class, 'index'])->name('master.admin.index');
    Route::get('/admin/{admin}/edit', [AdminController::class, 'edit'])->name('master.admin.edit');
    Route::put('/admin/{admin}', [AdminController::class, 'update'])->name('master.admin.update');
});
