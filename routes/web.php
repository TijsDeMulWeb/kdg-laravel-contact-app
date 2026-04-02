<?php
use App\Http\Controllers\Contact\ContactActivateController;
use App\Http\Controllers\Contact\ContactDeleteController;
use App\Http\Controllers\Contact\ContactStoreController;
use App\Http\Controllers\Contact\ContactEditController;
use App\Http\Controllers\Contact\ContactUpdateController;
use App\Http\Controllers\Contact\ContactCreateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'destroy']);
    Route::get('/contacts', [ContactController::class, 'index']);
    Route::get('/contacts/create', [ContactCreateController::class]);
    Route::post('/contacts/store', [ContactStoreController::class]);
    Route::delete('/contacts/{contact}', [ContactDeleteController::class]);
    Route::put('/contacts/{contact}', [ContactActivateController::class])->withTrashed();
    Route::get('/contacts/{contact}/edit', [ContactEditController::class]);
    Route::put('/contacts/{contact}/edit', [ContactUpdateController::class]);
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'show']);
    Route::post('/register', [RegisterController::class, 'store']);
    
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});
  