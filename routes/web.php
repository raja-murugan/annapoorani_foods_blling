<?php

use App\Http\Controllers\DeliveryplanController;
use App\Http\Controllers\ManagerController;
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
    return redirect('/login');
});

// MANAGER INVITE ACCEPT
Route::get('/accept/{token}', [ManagerController::class, 'accept']);

Auth::routes();

// BACKEND - ROUTE - WITH SANTUM VERIFIED
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // DASHBOARD
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // MANAGER & INVITE CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/billing/manager/invite', [ManagerController::class, 'index'])->name('manager.invite.index');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/billing/manager/invite/store', [ManagerController::class, 'store'])->name('manager.invite.store');
    });
    // DELIVERY PLAN CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/delivery/plan', [DeliveryplanController::class, 'index'])->name('delivery.plan.index');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/delivery/plan/store', [DeliveryplanController::class, 'store'])->name('delivery.plan.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/delivery/plan/edit/{unique_key}', [DeliveryplanController::class, 'edit'])->name('delivery.plan.edit');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/delivery/plan/delete/{unique_key}', [DeliveryplanController::class, 'delete'])->name('delivery.plan.delete');
    });
});
