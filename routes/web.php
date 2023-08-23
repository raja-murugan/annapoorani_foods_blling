<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\DeliveryareaController;
use App\Http\Controllers\DeliveryboyController;
use App\Http\Controllers\DeliveryplanController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
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
    // DELIVERY BOY CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/delivery/boy', [DeliveryboyController::class, 'index'])->name('delivery.boy.index');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/delivery/boy/store', [DeliveryboyController::class, 'store'])->name('delivery.boy.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/delivery/boy/edit/{unique_key}', [DeliveryboyController::class, 'edit'])->name('delivery.boy.edit');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/delivery/boy/delete/{unique_key}', [DeliveryboyController::class, 'delete'])->name('delivery.boy.delete');
    });
    // CUSTOMER CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/customer', [CustomerController::class, 'index'])->name('customer.index');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/customer/store', [CustomerController::class, 'store'])->name('customer.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/customer/edit/{unique_key}', [CustomerController::class, 'edit'])->name('customer.edit');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/customer/delete/{unique_key}', [CustomerController::class, 'delete'])->name('customer.delete');
        // CHECK DUPLICATE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/customer/checkduplicate', [CustomerController::class, 'checkduplicate'])->name('customer.checkduplicate');
    });
    // EMPLOYEE CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/employee', [EmployeeController::class, 'index'])->name('employee.index');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/employee/edit/{unique_key}', [EmployeeController::class, 'edit'])->name('employee.edit');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/employee/delete/{unique_key}', [EmployeeController::class, 'delete'])->name('employee.delete');
        // CHECK DUPLICATE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/employee/checkduplicate', [EmployeeController::class, 'checkduplicate'])->name('employee.checkduplicate');
    });
    // SESSION CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/session', [SessionController::class, 'index'])->name('session.index');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/session/store', [SessionController::class, 'store'])->name('session.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/session/edit/{unique_key}', [SessionController::class, 'edit'])->name('session.edit');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/session/delete/{unique_key}', [SessionController::class, 'delete'])->name('session.delete');
    });
    // CATEGORY CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/category', [CategoryController::class, 'index'])->name('category.index');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/category/store', [CategoryController::class, 'store'])->name('category.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/category/edit/{unique_key}', [CategoryController::class, 'edit'])->name('category.edit');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/category/delete/{unique_key}', [CategoryController::class, 'delete'])->name('category.delete');
    });
    // PRODUCT CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/product', [ProductController::class, 'index'])->name('product.index');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/product/store', [ProductController::class, 'store'])->name('product.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/product/edit/{unique_key}', [ProductController::class, 'edit'])->name('product.edit');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/product/delete/{unique_key}', [ProductController::class, 'delete'])->name('product.delete');
        // CHECK DUPLICATE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/product/checkduplicate', [ProductController::class, 'checkduplicate'])->name('product.checkduplicate');
    });


        // SALES CONTROLLER
        Route::middleware(['auth:sanctum', 'verified'])->group(function () {
            // INDEX
            Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/sales', [SaleController::class, 'index'])->name('sales.index');
            // CREATE
            Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/sales/create', [SaleController::class, 'create'])->name('sales.create');
        });


    Route::get('/sales', function () {return view('page/backend/sales/index');});
});


Route::get('/getcategories', [ProductController::class, 'getcategories']);
Route::get('/getselectedproducts', [SaleController::class, 'getselectedproducts']);
