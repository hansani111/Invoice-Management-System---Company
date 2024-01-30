<?php

use App\Http\Controllers\AccountDetailController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceItemController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/get-state/{companyId}', [InvoiceController::class, 'getState']);

Route::get('dashboard', [AppController::class, 'index'])->name('dashboard');


Route::get('add-company', [CompanyController::class, 'addCompany'])->name('add-company');
Route::post('create-company', [CompanyController::class, 'createCompany'])->name('create-company');
Route::get('manage-companies', [CompanyController::class, 'index'])->name('manage-companies');
Route::get('show-company/{id}', [CompanyController::class, 'showCompany'])->name('show-company');
Route::get('edit-company/{id}', [CompanyController::class, 'editCompany'])->name('edit-company');
Route::put('update-company/{id}', [CompanyController::class, 'updateCompany'])->name('update-company');
Route::delete('delete-company/{company}', [CompanyController::class, 'deleteCompany'])->name('delete-company');


Route::get('add-company-account-detail', [AccountDetailController::class, 'addCompanyAccountDetail'])->name('account-detail');
Route::post('create-company-account-detail', [AccountDetailController::class, 'createCompanyAccountDetail'])->name('create-account-detail');
Route::get('manage-companies-account-details', [AccountDetailController::class, 'index'])->name('manage-account-details');
Route::get('show-company-account-detail/{id}', [AccountDetailController::class, 'showCompanyAccountDetail'])->name('show-account-detail');
Route::get('edit-company-account-detail/{id}', [AccountDetailController::class, 'editCompanyAccountDetail'])->name('edit-account-detail');
Route::put('update-company-account-detail/{id}', [AccountDetailController::class, 'updateCompanyAccountDetail'])->name('update-account-detail');
Route::delete('delete-company-account-detail/{companyaccountdetail}', [AccountDetailController::class, 'deleteCompanyAccountDetail'])->name('delete-account-detail');


Route::get('add-invoice', [InvoiceController::class, 'addInvoice'])->name('add-invoice');
Route::post('create/invoice', [InvoiceController::class, 'createInvoice'])->name('create_invoice');
Route::post('/datastore',[InvoiceController::class, 'istore'])->name('data');
Route::get('manage-invoices', [InvoiceController::class, 'index'])->name('manage-invoices');
Route::get('edit-invoice/{id}', [InvoiceController::class, 'editInvoice'])->name('edit-invoice');
Route::put('update-invoice/{id}', [InvoiceController::class, 'updateInvoice'])->name('update-invoice');
// Route::delete('delete-invoice/{invoice}', [InvoiceController::class, 'deleteInvoice'])->name('delete-invoice');

Route::get('print-invoice/{id}', [InvoiceController::class, 'printInvoice'])->name('print-invoice');
Route::get('download-invoice/{id}', [InvoiceController::class, 'downloadInvoice'])->name('download-invoice');



Route::get('/add-invoice-item', [InvoiceItemController::class, 'addInvoiceItem'])->name('add-invoice-item');
Route::post('/create-invoice-item', [InvoiceItemController::class, 'createInvoiceItem'])->name('create-invoice-item');
Route::get('/manage-invoice-items', [InvoiceItemController::class, 'index'])->name('manage-invoice-items');
Route::get('/show-invoice-item/{id}', [InvoiceItemController::class, 'showInvoiceItem'])->name('show-invoice-item');
Route::get('/edit-invoice-item/{id}', [InvoiceItemController::class, 'editInvoiceItem'])->name('edit-invoice-item');
Route::put('/update-invoice-item/{id}', [InvoiceItemController::class, 'updateInvoiceItem'])->name('update-invoice-item');
Route::delete('/delete-invoice-item/{item}', [InvoiceItemController::class, 'deleteInvoiceItem'])->name('delete-invoice-item');


// is_deleted soft delete
Route::get('/delete-invoice/{table}/{id}', [AppController::class, 'delete'])->name('delete-invoice');


Route::get('/practice', [AppController::class, 'practice'])->name('practice');

