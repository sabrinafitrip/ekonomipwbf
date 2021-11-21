<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UkuranController;
use App\Http\Controllers\WarnaController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
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
Route::post('/supplier/store', [SupplierController::class, 'store'] );
Route::get('/supplier/editsupplier{ID_SUP}', [SupplierController::class, 'edit'] );
Route::post('/supplier/updatesup', [SupplierController::class, 'update'] );
// Route::get('/supplier/hapussup{ID_SUP}', [SupplierController::class, 'delete'] );
// Route::delete('/supplier/hapussup{ID_SUP}', [SupplierController::class, 'delete'] );
// Route::get('/supplier/hapussup{ID_SUP}', [SupplierController::class, 'hapus'] );
Route::delete('/supplier/hapussup{ID_SUP}', [SupplierController::class, 'hapus'] );
Route::get('/supplier/trashsup', [SupplierController::class, 'trash'] );
Route::get('/supplier/restoresup{ID_SUP?}', [SupplierController::class, 'restore'] );
Route::get('/supplier/deletesup{ID_SUP?}', [SupplierController::class, 'delete'] );


Route::get('/jenisbarang', [JenisController::class, 'index'] );
Route::get('/jenisbarang/addjenis', [JenisController::class, 'add'] );
Route::post('/jenisbarang/store', [JenisController::class, 'store'] );
// Route::post('/jenisbarang/store','App\Http\Controllers\JenisController@store');
Route::get('/jenisbarang/editjenis{ID_JB}', [JenisController::class, 'edit'] );
Route::post('/jenisbarang/updatejenis', [JenisController::class, 'update'] );
// Route::get('/jenisbarang/hapusjenis{ID_JB}', [JenisController::class, 'delete'] );
// Route::delete('/jenisbarang/hapusjenis{ID_JB}', [JenisController::class, 'delete'] );
// Route::get('/jenisbarang/hapusjenis{ID_JB}', [JenisController::class, 'hapus'] );
Route::delete('/jenisbarang/hapusjenis{ID_JB}', [JenisController::class, 'hapus'] );


Route::get('/barang', [BarangController::class, 'index'] );
Route::get('/barang/addbarang', [BarangController::class, 'add'] );
Route::post('/barang/store', [BarangController::class, 'store'] );
Route::get('/barang/editbarang{KODE_BARANG}', [BarangController::class, 'edit'] );
Route::post('/barang/updatebarang', [BarangController::class, 'update'] );
// Route::get('/barang/hapusbarang{KODE_BARANG}', [BarangController::class, 'delete'] );
// Route::delete('/barang/hapusbarang{KODE_BARANG}', [BarangController::class, 'delete'] );
// Route::get('/barang/hapusbarang{KODE_BARANG}', [BarangController::class, 'hapus'] );
Route::delete('/barang/hapusbarang{KODE_BARANG}', [BarangController::class, 'hapus'] );
Route::get('/barang/trashbarang', [BarangController::class, 'trash'] );
Route::get('/barang/restorebarang{KODE_BARANG?}', [BarangController::class, 'restore'] );
Route::get('/barang/deletebarang{KODE_BARANG?}', [BarangController::class, 'delete'] );


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


Route::get('/ukuran', [UkuranController::class, 'index'] );
Route::get('/ukuran/addukuran', [UkuranController::class, 'add'] );
Route::post('/ukuran/store', [UkuranController::class, 'store'] );
// Route::post('/ukuran/store','App\Http\Controllers\UkuranController@store');
Route::get('/ukuran/editukuran{ID_UKURAN}', [UkuranController::class, 'edit'] );
Route::post('/ukuran/update', [UkuranController::class, 'update'] );
// Route::get('/ukuran/hapusukuran{ID_UKURAN}', [UkuranController::class, 'delete'] );
// Route::delete('/ukuran/hapusukuran{ID_UKURAN}', [UkuranController::class, 'delete'] );
// Route::get('/ukuran/hapusukuran{ID_UKURAN}', [UkuranController::class, 'hapus'] );
Route::delete('/ukuran/hapusukuran{ID_UKURAN}', [UkuranController::class, 'hapus'] );


Route::get('/warna', [WarnaController::class, 'index'] );
Route::get('/warna/addwarna', [WarnaController::class, 'add'] );
Route::post('/warna/store', [WarnaController::class, 'store'] );
// Route::post('/warna/store','App\Http\Controllers\KotaController@store');
Route::get('/warna/editwarna{ID_WARNA}', [WarnaController::class, 'edit'] );
Route::post('/warna/update', [WarnaController::class, 'update'] );
// Route::get('/warna/hapuswarna{ID_WARNA}', [WarnaController::class, 'delete'] );
// Route::delete('/warna/hapuswarna{ID_WARNA}', [WarnaController::class, 'delete'] );
// Route::get('/warna/hapuswarna{ID_WARNA}', [WarnaController::class, 'hapus'] );
Route::delete('/warna/hapuswarna{ID_WARNA}', [WarnaController::class, 'hapus'] );


Route::get('/user', [UserController::class, 'index'] );
Route::get('/user/adduser', [UserController::class, 'add'] );


Route::get('/login', function () {
    return view('login');
});