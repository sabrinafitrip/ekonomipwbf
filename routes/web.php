<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\SupplierController;

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
    return view('home');
});


Route::get('/main', function () {
    return view('main');
});

// Route::get('/supplier', function () {
//     return view('supplier');
// });

Route::get('/kota', [KotaController::class, 'index'] );
Route::get('/supplier', [SupplierController::class, 'index'] );