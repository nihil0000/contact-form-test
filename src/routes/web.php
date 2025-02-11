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

// register page
Route::get('/register', function () {
    return view('register');
})->name('register');

// register
Route::post('register', [AuthController::class, 'register']);

// login page
Route::get('/login', function () {
    return view('login');
})->name('login');

// login
Route::post('/login', [AuthController::class, 'login']);

/*
admin page
未ログイン状態の場合、loginページに遷移する
*/
Route::get('/admin', function () {
    return view('admin');
})->middleware('auth')->name('admin');

// logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// TODO: controllerを使用してviewを返す
Route::get('/confirm', function () {
    return view('/confirm');
})->name('confirm');

// TODO: controllerを使用してviewを返す
Route::get('/thanks', function () {
    return view('/thanks');
})->name('thanks');


Route::get('/', [ContactController::class, 'index']);
