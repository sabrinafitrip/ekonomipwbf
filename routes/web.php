<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;


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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('main');
});

// Route::get('/supplier', function () {
//     return view('supplier');
// });

Route::get('/kota', [KotaController::class, 'index'] );
Route::get('/kota/addkotaa', [KotaController::class, 'add'] );


Route::get('/supplier', [SupplierController::class, 'index'] );
Route::get('/supplier/addsupplier', [SupplierController::class, 'add'] );


Route::get('/role', [RoleController::class, 'index'] );
Route::get('/role/addrole', [RoleController::class, 'add'] );


Route::get('/user', [UserController::class, 'index'] );
Route::get('/user/adduser', [UserController::class, 'add'] );


Route::get('/login', function () {
    return view('login');
});