<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\DeliveryareaController;
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
    // BANK CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/payment/method', [BankController::class, 'index'])->name('bank.index');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/payment/method/store', [BankController::class, 'store'])->name('bank.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/payment/method/edit/{unique_key}', [BankController::class, 'edit'])->name('bank.edit');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/payment/method/delete/{unique_key}', [BankController::class, 'delete'])->name('bank.delete');
    });
    // DELIVERY AREA CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/delivery/area', [DeliveryareaController::class, 'index'])->name('delivery.area.index');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/delivery/area/store', [DeliveryareaController::class, 'store'])->name('delivery.area.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/delivery/area/edit/{unique_key}', [DeliveryareaController::class, 'edit'])->name('delivery.area.edit');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/delivery/area/delete/{unique_key}', [DeliveryareaController::class, 'delete'])->name('delivery.area.delete');
    });
});
