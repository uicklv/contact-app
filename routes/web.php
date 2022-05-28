<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Settings\AccountController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ContactController;
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

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
//    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
//    Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
//    Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
//    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
//    Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
//    Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
//    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});
Route::resources([
    '/contacts' => ContactController::class,
    '/companies' => CompanyController::class,
]);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/settings/account', [AccountController::class, 'index']);
