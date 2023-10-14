<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;


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

Route::resource('orders',OrderController::class);
Route::resource('products',ProductController::class);
Route::resource('/suppliers', 'SupplierController');
Route::resource('users',UserController::class);
Route::resource('/companies', 'CompanyController');
Route::resource('/transactions', 'TransactionController');
Route::get('/users/{user}', 'UserController@show');
