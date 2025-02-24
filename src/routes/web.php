<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

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

// Index
Route::get('/', [ContactController::class, 'index'])->name('index');


// Authentication
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');      // Login form
    Route::post('/login', 'login');                            // User login
    Route::get('/register', 'showRegisterForm')->name('register'); // Register Form
    Route::post('/register', 'register');                      // User register
    Route::post('/logout', 'logout')->name('logout');          // User logout
});


// Admin routes (Protected by auth)
Route::middleware('auth')->prefix('admin')->name('admin')->group(function () {
    Route::get('/', [ContactController::class, 'search']);
    Route::delete('/{contact}', [ContactController::class, 'destroy'])->name('.destroy');
    Route::get('/export', [ContactController::class, 'export'])->name('.export');
});


// Confirmation
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');
Route::post('/edit', [ContactController::class, 'edit'])->name('edit');


// Thanks
Route::post('/thanks', [ContactController::class, 'store'])->name('thanks');
