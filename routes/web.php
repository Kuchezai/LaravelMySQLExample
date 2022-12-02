<?php

use App\Models\Company;
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
    return view('welcome');
});

Route::get('/companies', [\App\Http\Controllers\CompanyController::class, "index"])->name('companies.index');
Route::get('/companies/create', [\App\Http\Controllers\CompanyController::class, "create"])->name('companies.create');
Route::get('/companies/{company}', [\App\Http\Controllers\CompanyController::class, "show"])->name('companies.show');
Route::post('/companies', [\App\Http\Controllers\CompanyController::class, "store"])->name('companies.store');

Route::get('/shipment/create', [\App\Http\Controllers\ShipmentController::class, "create"])->name('shipment.create');
Route::post('/shipments', [\App\Http\Controllers\ShipmentController::class, "store"])->name('shipment.store');
Route::post('/shipments/edit', [\App\Http\Controllers\ShipmentController::class, "edit"])->name('shipment.edit');


Route::post('/payments', [\App\Http\Controllers\AgreementController::class, "paymentEdit"])->name('agreements.payment.edit');

Route::get('/agreements', [\App\Http\Controllers\AgreementController::class, "index"])->name('agreements.index');
Route::get('/agreements/create', [\App\Http\Controllers\AgreementController::class, "create"])->name('agreements.create');
Route::post('/agreements', [\App\Http\Controllers\AgreementController::class, "store"])->name('agreements.store');


