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


Route::get('/kota', [KotaController::class, 'index'] );
Route::get('/kota/addkota', [KotaController::class, 'add'] );
Route::post('/kota/store', [KotaController::class, 'store'] );
// Route::post('/kota/store','App\Http\Controllers\KotaController@store');
Route::get('/kota/editkota{ID_KOTA}', [KotaController::class, 'edit'] );
Route::post('/kota/update', [KotaController::class, 'update'] );
// Route::get('/kota/hapuskota{ID_KOTA}', [KotaController::class, 'delete'] );
// Route::delete('/kota/hapuskota{ID_KOTA}', [KotaController::class, 'delete'] );
// Route::get('/kota/hapuskota{ID_KOTA}', [KotaController::class, 'hapus'] );
Route::delete('/kota/hapuskota{ID_KOTA}', [KotaController::class, 'hapus'] );


Route::get('/supplier', [SupplierController::class, 'index'] );
Route::get('/supplier/addsupplier', [SupplierController::class, 'add'] );


Route::get('/role', [RoleController::class, 'index'] );
Route::get('/role/addrole', [RoleController::class, 'add'] );
Route::post('/role/store', [RoleController::class, 'store'] );
// Route::post('/role/store','App\Http\Controllers\RoleController@store');
Route::get('/role/editrole{ID_ROLE}', [RoleController::class, 'edit'] );
Route::post('/role/update', [RoleController::class, 'update'] );
// Route::get('/role/hapusrole{ID_ROLE}', [RoleController::class, 'delete'] );
// Route::delete('/role/hapusrole{ID_ROLE}', [RoleController::class, 'delete'] );
//(SOFT DELETE)
// Route::get('/role/hapusrole{ID_ROLE}', [RoleController::class, 'hapus'] );
Route::delete('/role/hapusrole{ID_ROLE}', [RoleController::class, 'hapus'] );


Route::get('/user', [UserController::class, 'index'] );
Route::get('/user/adduser', [UserController::class, 'add'] );


Route::get('/login', function () {
    return view('login');
});