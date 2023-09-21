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
use App\Http\Controllers\PurchaseproductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SalespaymentController;
use App\Http\Controllers\ProductsessionController;
use App\Http\Controllers\PurchasepaymentController;
use App\Http\Controllers\EmpattendanceController;
use App\Http\Controllers\DeliveryAttendanceController;
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


    // PRODUCT SESSION CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/productsession', [ProductsessionController::class, 'index'])->name('productsession.index');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/productsession/store', [ProductsessionController::class, 'store'])->name('productsession.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/productsession/edit/{id}', [ProductsessionController::class, 'edit'])->name('productsession.edit');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/productsession/delete/{id}', [ProductsessionController::class, 'delete'])->name('productsession.delete');
        // CHECK DUPLICATE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/productsession/checkduplicate', [ProductsessionController::class, 'checkduplicate'])->name('productsession.checkduplicate');
    });


    // SALES CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/sales', [SaleController::class, 'index'])->name('sales.index');
        // CREATE
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/sales/create', [SaleController::class, 'create'])->name('sales.create');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/sales/delete/{unique_key}', [SaleController::class, 'delete'])->name('sales.delete');

        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/sales/print/{last_salesid}', [SaleController::class, 'getLastId'])->name('sales.getLastId');
        // DATAE FILTER
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/sales/datefilter', [SaleController::class, 'datefilter'])->name('sales.datefilter');
        // AUTO COMPLETE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/sales/autocomplete', [SaleController::class, 'autocomplete'])->name('sales.autocomplete');
    });


    // PURCHASE PRODUCT CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/purchase_product', [PurchaseproductController::class, 'index'])->name('purchase_product.index');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/purchase_product/store', [PurchaseproductController::class, 'store'])->name('purchase_product.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/purchase_product/edit/{unique_key}', [PurchaseproductController::class, 'edit'])->name('purchase_product.edit');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/purchase_product/delete/{unique_key}', [PurchaseproductController::class, 'delete'])->name('purchase_product.delete');
        // CHECK DUPLICATE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/purchase_product/checkduplicate', [PurchaseproductController::class, 'checkduplicate'])->name('purchase_product.checkduplicate');
    });


    // SUPPLIER CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/supplier', [SupplierController::class, 'index'])->name('supplier.index');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/supplier/edit/{unique_key}', [SupplierController::class, 'edit'])->name('supplier.edit');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/supplier/delete/{unique_key}', [SupplierController::class, 'delete'])->name('supplier.delete');
        // CHECK DUPLICATE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/supplier/checkduplicate', [SupplierController::class, 'checkduplicate'])->name('supplier.checkduplicate');
    });


    // PURCHASE CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/purchase', [PurchaseController::class, 'index'])->name('purchase.index');
        // CREATE
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/purchase/create', [PurchaseController::class, 'create'])->name('purchase.create');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/purchase/store', [PurchaseController::class, 'store'])->name('purchase.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/purchase/edit/{unique_key}', [PurchaseController::class, 'edit'])->name('purchase.edit');
        // UPDATE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/purchase/update/{unique_key}', [PurchaseController::class, 'update'])->name('purchase.update');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/purchase/delete/{unique_key}', [PurchaseController::class, 'delete'])->name('purchase.delete');
        // DATAE FILTER
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/purchase/datefilter', [PurchaseController::class, 'datefilter'])->name('purchase.datefilter');
    });


    // SALESPAYMENT CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/salespayment', [SalespaymentController::class, 'index'])->name('salespayment.index');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/salespayment/store', [SalespaymentController::class, 'store'])->name('salespayment.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/salespayment/edit/{unique_key}', [SalespaymentController::class, 'edit'])->name('salespayment.edit');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/salespayment/delete/{unique_key}', [SalespaymentController::class, 'delete'])->name('salespayment.delete');
        // CHECK DUPLICATE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/salespayment/datefilter', [SalespaymentController::class, 'datefilter'])->name('salespayment.datefilter');
    });


    // PURCHASEPAYMENT CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/purchasepayment', [PurchasepaymentController::class, 'index'])->name('purchasepayment.index');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/purchasepayment/store', [PurchasepaymentController::class, 'store'])->name('purchasepayment.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/purchasepayment/edit/{unique_key}', [PurchasepaymentController::class, 'edit'])->name('purchasepayment.edit');
        // DELETE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/purchasepayment/delete/{unique_key}', [PurchasepaymentController::class, 'delete'])->name('purchasepayment.delete');
        // CHECK DUPLICATE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/purchasepayment/datefilter', [PurchasepaymentController::class, 'datefilter'])->name('purchasepayment.datefilter');
    });



    // EMPLOYEE ATTENDANCE CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/emp_attendance', [EmpattendanceController::class, 'index'])->name('emp_attendance.index');
        // CREATE
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/emp_attendance/create', [EmpattendanceController::class, 'create'])->name('emp_attendance.create');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/emp_attendance/store', [EmpattendanceController::class, 'store'])->name('emp_attendance.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/emp_attendance/edit/{unique_key}', [EmpattendanceController::class, 'edit'])->name('emp_attendance.edit');
        // UPDATE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/emp_attendance/update/{unique_key}', [EmpattendanceController::class, 'update'])->name('emp_attendance.update');
        // DATAE FILTER
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/emp_attendance/datefilter', [EmpattendanceController::class, 'datefilter'])->name('emp_attendance.datefilter');
    });


    // DELIVERY ATTENDANCE CONTROLLER
    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // INDEX
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/delivery_attendance', [DeliveryAttendanceController::class, 'index'])->name('delivery_attendance.index');
        // CREATE
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/delivery_attendance/create', [DeliveryAttendanceController::class, 'create'])->name('delivery_attendance.create');
        // STORE
        Route::middleware(['auth:sanctum', 'verified'])->post('/zworktechnology/delivery_attendance/store', [DeliveryAttendanceController::class, 'store'])->name('delivery_attendance.store');
        // EDIT
        Route::middleware(['auth:sanctum', 'verified'])->get('/zworktechnology/delivery_attendance/edit/{unique_key}', [DeliveryAttendanceController::class, 'edit'])->name('delivery_attendance.edit');
        // UPDATE
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/delivery_attendance/update/{unique_key}', [DeliveryAttendanceController::class, 'update'])->name('delivery_attendance.update');
        // DATAE FILTER
        Route::middleware(['auth:sanctum', 'verified'])->put('/zworktechnology/delivery_attendance/datefilter', [DeliveryAttendanceController::class, 'datefilter'])->name('delivery_attendance.datefilter');
    });


    //Route::get('/zworktechnology/sales/print/{sales_id}', function () {return view('page/backend/sales/print');});
});


Route::get('/getcategories', [ProductController::class, 'getcategories']);
Route::get('/getselectedproducts', [SaleController::class, 'getselectedproducts']);
Route::get('/getselectedboxproducts', [SaleController::class, 'getselectedboxproducts']);
Route::post('/zworktechnology/sales/storeSalesData', [SaleController::class, 'storeSalesData'])->name('sales.store.salesdata');
Route::get('/getproduct_Id_by_name/{productid}', [SaleController::class, 'getproduct_Id_by_name']);
Route::get('/getselectedcat_products', [ProductController::class, 'getselectedcat_products']);
Route::get('/GetAutosearchProducts', [SaleController::class, 'GetAutosearchProducts']);
Route::get('getProducts/', [PurchaseController::class, 'getProducts']);
Route::get('getsalelatest/', [SaleController::class, 'getsalelatest']);
Route::get('/getselectedsessioncat', [SaleController::class, 'getselectedsessioncat']);

Route::get('/getoldbalanceforPayment', [SaleController::class, 'getoldbalanceforPayment']);
Route::get('/getbalanceforpurchasePayment', [PurchaseController::class, 'getbalanceforpurchasePayment']);
