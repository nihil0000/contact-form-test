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

/**
 * index
 */
Route::get('/', [ContactController::class, 'index'])->name('index');

/**
 * register
 */
Route::get('/register', function () {
    return view('register');
})->name('register'); // registre page
Route::post('register', [AuthController::class, 'register']); // register action

/**
 * login
 */
Route::get('/login', function () {
    return view('login');
})->name('login'); // login page
Route::post('/login', [AuthController::class, 'login']); // login action

/**
 * admin
 * 未ログイン状態の場合、loginページに遷移する
 */
Route::get('/admin', [ContactController::class, 'search'])->middleware('auth')->name('admin'); // admin page
Route::delete('/admin', [ContactController::class, 'destroy']); // delete contact
Route::get('/admin/export', [ContactController::class, 'export'])->name('admin.export'); // export csv

/**
 * logout
 */
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

/**
 * confirm
 */
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');
Route::post('/edit', [ContactController::class, 'edit'])->name('edit');

/**
 * thanks
 */
Route::post('/thanks', [ContactController::class, 'store'])->name('thanks');
