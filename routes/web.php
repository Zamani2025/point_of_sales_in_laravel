<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

//Invoice Routes

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/invoice', [App\Http\Controllers\InvoiceController::class, 'Invoice'])->name('invoice');
Route::get('/monthly-invoice', [App\Http\Controllers\InvoiceController::class, 'monthly_invoice'])->name('monthly');
Route::get('/estimate-invoice', [App\Http\Controllers\InvoiceController::class, 'estimate_invoice'])->name('estimate.invoice');
Route::get('/estimate-pdf', [App\Http\Controllers\InvoiceController::class, 'estimate_invoicePDF'])->name('estimate.pdf');
Route::get('/preview-invoice', [App\Http\Controllers\InvoiceController::class, 'prev'])->name('previnvoice');
Route::get('/employee-invoice', [App\Http\Controllers\InvoiceController::class, 'employee_invoice'])->name('employeeinvoice');
Route::get('/employee-pdf', [App\Http\Controllers\InvoiceController::class, 'employee_invoicePDF'])->name('employee.pdf');
Route::get('/stock-invoice', [App\Http\Controllers\InvoiceController::class, 'stock_invoice'])->name('stockinvoice');
Route::get('/stock-pdf', [App\Http\Controllers\InvoiceController::class, 'stock_invoicePDF'])->name('stock.pdf');

//Main Routes
Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->middleware('auth')->name('orders');
Route::post('/add-order', [App\Http\Controllers\OrderController::class, 'store'])->middleware('auth')->name('addorder');
Route::get('/product',  [App\Http\Controllers\ProductController::class, 'index'])->middleware('auth')->name('products');
Route::get('/product/barcode',  [App\Http\Controllers\ProductController::class, 'barcodes'])->middleware('auth')->name('products.code');
Route::post('/add-product',  [App\Http\Controllers\ProductController::class, 'store'])->middleware('auth')->name('addproduct');
Route::get('/incoming-product',  [App\Http\Controllers\ProductController::class, 'incoming'])->middleware('auth')->name('incomingproduct');
Route::post('/edit-product/{id}',  [App\Http\Controllers\ProductController::class, 'update'])->middleware('auth')->name('editproduct');
Route::post('/delete-product/{id}',  [App\Http\Controllers\ProductController::class, 'destroy'])->middleware('auth')->name('deleteproduct');
Route::get('/suppliers', [App\Http\Controllers\SupplierController::class, 'index'])->middleware('auth')->name('supplier');
Route::post('/add-supplier', [App\Http\Controllers\SupplierController::class, 'store'])->middleware('auth')->name('addsupplier');
Route::post('/edit-supplier/{id}', [App\Http\Controllers\SupplierController::class, 'update'])->middleware('auth')->name('editsupplier');
Route::post('/delete-supplier/{id}', [App\Http\Controllers\SupplierController::class, 'destroy'])->middleware('auth')->name('deletesupplier');
Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->middleware('auth')->name('employee');
Route::post('/add-employee', [App\Http\Controllers\EmployeeController::class, 'store'])->middleware('auth')->name('adduser');
Route::post('/edit-employee/{id}', [App\Http\Controllers\EmployeeController::class, 'update'])->middleware('auth')->name('edituser');
Route::post('/delete-employee/{id}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->middleware('auth')->name('deleteuser');
Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index'])->middleware('auth')->name('customer');
Route::post('/delete-order/{id}', [App\Http\Controllers\CustomerController::class, 'destroy'])->middleware('auth')->name('deletecustomer');
Route::get('/transactions', [App\Http\Controllers\TransactionController::class, 'index'])->middleware('auth')->name('transaction');
Route::get('/bank-statements', [App\Http\Controllers\BankStatementController::class, 'index'])->middleware('auth')->name('bank');
Route::post('/bank-statements', [App\Http\Controllers\BankStatementController::class, 'store'])->middleware('auth')->name('bank.store');
Route::get('/return-products', [App\Http\Controllers\ReturnProductController::class, 'index'])->middleware('auth')->name('return_products');
Route::post('/add-return-products', [App\Http\Controllers\ReturnProductController::class, 'store'])->middleware('auth')->name('addreturn_products');
Route::get('/estimate', [App\Http\Controllers\EstimateController::class, 'index'])->middleware('auth')->name('estimate');
Route::post('/add-estimate', [App\Http\Controllers\EstimateController::class, 'store'])->middleware('auth')->name('estimate.add');
