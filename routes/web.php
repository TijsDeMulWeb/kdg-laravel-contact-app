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
    Route::get('/logout', LogoutController::class);
    Route::get('/contacts', ContactIndexController::class);
    Route::get('/contacts/create', ContactCreateController::class);
    Route::post('/contacts/store', ContactStoreController::class);
    Route::delete('/contacts/{contact}', ContactDeleteController::class);
    Route::put('/contacts/{contact}', ContactActivateController::class)->withTrashed();
    Route::get('/contacts/{contact}/edit', ContactEditController::class);
    Route::put('/contacts/{contact}/edit', ContactUpdateController::class);
});

Route::middleware('guest')->group(function () {
    Route::get('/register', RegisterShowController::class);
    Route::post('/register', RegisterStoreController::class);
    
    Route::get('/login', LoginShowController::class)->name('login');
    Route::post('/login', LoginController::class);
});
  