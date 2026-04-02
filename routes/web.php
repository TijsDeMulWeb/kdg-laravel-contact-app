<?php
use App\Http\Controllers\Contact\ContactIndexController;
use App\Http\Controllers\Contact\ContactActivateController;
use App\Http\Controllers\Contact\ContactDeleteController;
use App\Http\Controllers\Contact\ContactStoreController;
use App\Http\Controllers\Contact\ContactEditController;
use App\Http\Controllers\Contact\ContactUpdateController;
use App\Http\Controllers\Contact\ContactCreateController;

use App\Http\Controllers\Auth\LogoutController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Register\RegisterShowController;
use App\Http\Controllers\Auth\Register\RegisterStoreController;

use App\Http\Controllers\Auth\Login\LoginController;
use App\Http\Controllers\Auth\Login\LoginShowController;


Route::middleware('auth')->group(function () {
    Route::post('/logout', LogoutController::class)->name('logout');
    Route::get('/contacts', ContactIndexController::class)->name('contacts.index');
    Route::get('/contacts/create', ContactCreateController::class)->name('contacts.create');
    Route::post('/contacts/store', ContactStoreController::class)->name('contacts.store');
    Route::delete('/contacts/{contact}', ContactDeleteController::class)->name('contacts.delete');
    Route::put('/contacts/{contact}', ContactActivateController::class)->withTrashed()->name('contacts.activate');
    Route::get('/contacts/{contact}/edit', ContactEditController::class)->name('contacts.edit');
    Route::put('/contacts/{contact}/edit', ContactUpdateController::class)->name('contacts.update');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', RegisterShowController::class)->name('register');
    Route::post('/register', RegisterStoreController::class)->name('register.store');

    Route::get('/login', LoginShowController::class)->name('login');
    Route::post('/login', LoginController::class)->name('login.store');
});
  