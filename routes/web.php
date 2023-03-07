<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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



Route::get('/', [ContactController::class, 'index'])->name('contacts.index');


Route::post('contacts', [ContactController::class, 'store'])->name('contacts.store');


Route::get('contacts/create', [ContactController::class, 'create'])->name('contacts.create');


Route::get('contacts/{id}', [ContactController::class, 'ViewContact'])->name('contacts.byid');

Route::put('contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');


Route::delete('contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');


Route::get('contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('companies', [CompanyController::class, 'index'])->name('companies.index');

Route::get('companies/create', [CompanyController::class, 'create'])->name('companies.create');

Route::post('companies', [CompanyController::class, 'store'])->name('companies.store');
Route::get('companies/{id}',[CompanyController::class,'view'])->name('company.view');

Route::delete('company/{id}',[CompanyController::class,'destroy'])->name('company.destroy');
