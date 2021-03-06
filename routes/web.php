<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UkuranController;
use App\Http\Controllers\WarnaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HistorystockController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\BayarController;
use App\Http\Controllers\TerimaController;
use App\Http\Controllers\detailBarangController;
use App\Http\Controllers\detailPemesananController;
use App\Http\Controllers\detailPenerimaanController;



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

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/dashboard', function () {
    //     return view('grafik');
    // });

// Route::get('/register', function () {
//     return view('register');
// });

Route::get('/login', [AuthController::class, 'login'] )->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin'] );
Route::get('/logout', [AuthController::class, 'logout'] );


Route::group(['middleware' => ['auth','CheckLevel:admin,pegawai']],function(){
    Route::get('/dashboard', [DashboardController::class, 'index'] );

    Route::get('/kota', [KotaController::class, 'index'] );
    Route::get('/kota/cari', [KotaController::class, 'cari'] );
    Route::get('/kota/addkota', [KotaController::class, 'add'] );
    Route::post('/kota/store', [KotaController::class, 'store'] );
    // Route::post('/kota/store','App\Http\Controllers\KotaController@store');
    Route::get('/kota/editkota{ID_KOTA}', [KotaController::class, 'edit'] );
    Route::post('/kota/update', [KotaController::class, 'update'] );
    // Route::get('/kota/hapuskota{ID_KOTA}', [KotaController::class, 'delete'] );
    // Route::delete('/kota/hapuskota{ID_KOTA}', [KotaController::class, 'delete'] );
    // Route::get('/kota/hapuskota{ID_KOTA}', [KotaController::class, 'hapus'] );
    Route::delete('/kota/hapuskota{ID_KOTA}', [KotaController::class, 'hapus'] );
    Route::get('/kota/trashkota', [KotaController::class, 'trash'] );
    Route::get('/kota/restorekota{ID_KOTA?}', [KotaController::class, 'restore'] );
    Route::get('/kota/deletekota{ID_KOTA?}', [KotaController::class, 'delete'] );


    Route::get('/supplier', [SupplierController::class, 'index'] );
    Route::get('/supplier/cari', [SupplierController::class, 'cari'] );
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
    // Route::get('/supplier/cetaksupplier', [SupplierController::class, 'cetak'] );


    Route::get('/jenisbarang', [JenisController::class, 'index'] );
    Route::get('/jenisbarang/cari', [JenisController::class, 'cari'] );
    Route::get('/jenisbarang/addjenis', [JenisController::class, 'add'] );
    Route::post('/jenisbarang/store', [JenisController::class, 'store'] );
    // Route::post('/jenisbarang/store','App\Http\Controllers\JenisController@store');
    Route::get('/jenisbarang/editjenis{ID_JB}', [JenisController::class, 'edit'] );
    Route::post('/jenisbarang/updatejenis', [JenisController::class, 'update'] );
    // Route::get('/jenisbarang/hapusjenis{ID_JB}', [JenisController::class, 'delete'] );
    // Route::delete('/jenisbarang/hapusjenis{ID_JB}', [JenisController::class, 'delete'] );
    // Route::get('/jenisbarang/hapusjenis{ID_JB}', [JenisController::class, 'hapus'] );
    Route::delete('/jenisbarang/hapusjenis{ID_JB}', [JenisController::class, 'hapus'] );
    Route::get('/jenisbarang/trashjenis', [JenisController::class, 'trash'] );
    Route::get('/jenisbarang/restorejenis{ID_JB?}', [JenisController::class, 'restore'] );
    Route::get('/jenisbarang/deletejenis{ID_JB?}', [JenisController::class, 'delete'] );


    Route::get('/barang', [BarangController::class, 'index'] );
    Route::get('/barang/cari', [BarangController::class, 'cari'] );
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
    // Route::get('/barang/cetakbarang', [BarangController::class, 'cetak'] );


    Route::get('/pemesanan', [PesanController::class, 'index'] );
    Route::get('/pemesanan/cari', [PesanController::class, 'cari'] );
    Route::get('/pemesanan/addpesan', [PesanController::class, 'add'] );
    Route::post('/pemesanan/store', [PesanController::class, 'store'] );
    Route::get('/pemesanan/editpesan{ID_PESAN}', [PesanController::class, 'edit'] );
    Route::post('/pemesanan/updatepesan', [PesanController::class, 'update'] );
    // Route::get('/pemesanan/hapuspesan{ID_PESAN}', [PesanController::class, 'delete'] );
    // Route::delete('/pemesanan/hapuspesan{ID_PESAN}', [PesanController::class, 'delete'] );
    // Route::get('/pemesanan/hapuspesan{ID_PESAN}', [PesanController::class, 'hapus'] );
    Route::delete('/pemesanan/hapuspesan{ID_PESAN}', [PesanController::class, 'hapus'] );
    Route::get('/pemesanan/trashpesan', [PesanController::class, 'trash'] );
    Route::get('/pemesanan/restorepesan{ID_PESAN?}', [PesanController::class, 'restore'] );
    Route::get('/pemesanan/deletepesan{ID_PESAN?}', [PesanController::class, 'delete'] );
    // Route::get('/pemesanan/cetakpesan', [PesanController::class, 'cetak'] );


    Route::get('/penerimaan', [TerimaController::class, 'index'] );
    Route::get('/penerimaan/cari', [TerimaController::class, 'cari'] );
    Route::get('/penerimaan/addterima', [TerimaController::class, 'add'] );
    Route::post('/penerimaan/store', [TerimaController::class, 'store'] );
    Route::get('/penerimaan/editterima{ID_TERIMA}', [TerimaController::class, 'edit'] );
    Route::post('/penerimaan/updateterima', [TerimaController::class, 'update'] );
    // Route::get('/penerimaan/hapusterima{ID_TERIMA}', [TerimaController::class, 'delete'] );
    // Route::delete('/penerimaan/hapusterima{ID_TERIMA}', [TerimaController::class, 'delete'] );
    // Route::get('/penerimaan/hapusterima{ID_TERIMA}', [TerimaController::class, 'hapus'] );
    Route::delete('/penerimaan/hapusterima{ID_TERIMA}', [TerimaController::class, 'hapus'] );
    Route::get('/penerimaan/trashterima', [TerimaController::class, 'trash'] );
    Route::get('/penerimaan/restoreterima{ID_TERIMA?}', [TerimaController::class, 'restore'] );
    Route::get('/penerimaan/deleteterima{ID_TERIMA?}', [TerimaController::class, 'delete'] );
    // Route::get('/penerimaan/cetakterima', [TerimaController::class, 'cetak'] );

});

Route::group(['middleware' => ['auth','CheckLevel:admin']],function(){
    // Route::get('/dashboard', [DashboardController::class, 'index'] )->middleware('auth');

    Route::get('/supplier/cetaksupplier', [SupplierController::class, 'cetak'] );
    Route::get('/barang/cetakbarang', [BarangController::class, 'cetak'] );
    Route::get('/pemesanan/cetakpesan', [PesanController::class, 'cetak'] );
    Route::get('/penerimaan/cetakterima', [TerimaController::class, 'cetak'] );

    Route::get('/role', [RoleController::class, 'index'] );
    Route::get('/role/cari', [RoleController::class, 'cari'] );
    Route::get('/role/addrole', [RoleController::class, 'add'] );
    Route::post('/role/store', [RoleController::class, 'store'] );
    // Route::post('/role/store','App\Http\Controllers\RoleController@store');
    Route::get('/role/editrole{ID_ROLE}', [RoleController::class, 'edit'] );
    Route::post('/role/update', [RoleController::class, 'update'] );
    // Route::get('/role/hapusrole{ID_ROLE}', [RoleController::class, 'delete'] );
    // Route::delete('/role/hapusrole{ID_ROLE}', [RoleController::class, 'delete'] );
    // Route::get('/role/hapusrole{ID_ROLE}', [RoleController::class, 'hapus'] );
    Route::delete('/role/hapusrole{ID_ROLE}', [RoleController::class, 'hapus'] );
    Route::get('/role/trashrole', [RoleController::class, 'trash'] );
    Route::get('/role/restorerole{ID_ROLE?}', [RoleController::class, 'restore'] );
    Route::get('/role/deleterole{ID_ROLE?}', [RoleController::class, 'delete'] );


    Route::get('/user', [UserController::class, 'index'] );
    Route::get('/user/adduser', [UserController::class, 'add'] );
    Route::post('/user/store', [UserController::class, 'store'] );
    Route::get('/user/edituser{ID_USER}', [UserController::class, 'edit'] );
    Route::post('/user/updateuser', [UserController::class, 'update'] );
    // Route::get('/user/hapususer{ID_USER}', [UserController::class, 'delete'] );
    Route::delete('/user/hapususer{ID_USER}', [UserController::class, 'delete'] );
    // Route::get('/user/hapususer{ID_USER}', [UserController::class, 'hapus'] );
    // Route::delete('/user/hapususer{ID_USER}', [UserController::class, 'hapus'] );


    Route::get('/ukuran', [UkuranController::class, 'index'] );
    Route::get('/ukuran/cari', [UkuranController::class, 'cari'] );
    Route::get('/ukuran/addukuran', [UkuranController::class, 'add'] );
    Route::post('/ukuran/store', [UkuranController::class, 'store'] );
    // Route::post('/ukuran/store','App\Http\Controllers\UkuranController@store');
    Route::get('/ukuran/editukuran{ID_UKURAN}', [UkuranController::class, 'edit'] );
    Route::post('/ukuran/update', [UkuranController::class, 'update'] );
    // Route::get('/ukuran/hapusukuran{ID_UKURAN}', [UkuranController::class, 'delete'] );
    // Route::delete('/ukuran/hapusukuran{ID_UKURAN}', [UkuranController::class, 'delete'] );
    // Route::get('/ukuran/hapusukuran{ID_UKURAN}', [UkuranController::class, 'hapus'] );
    Route::delete('/ukuran/hapusukuran{ID_UKURAN}', [UkuranController::class, 'hapus'] );
    Route::get('/ukuran/trashukuran', [UkuranController::class, 'trash'] );
    Route::get('/ukuran/restoreukuran{ID_UKURAN?}', [UkuranController::class, 'restore'] );
    Route::get('/ukuran/deleteukuran{ID_UKURAN?}', [UkuranController::class, 'delete'] );


    Route::get('/warna', [WarnaController::class, 'index'] );
    Route::get('/warna/cari', [WarnaController::class, 'cari'] );
    Route::get('/warna/addwarna', [WarnaController::class, 'add'] );
    Route::post('/warna/store', [WarnaController::class, 'store'] );
    // Route::post('/warna/store','App\Http\Controllers\KotaController@store');
    Route::get('/warna/editwarna{ID_WARNA}', [WarnaController::class, 'edit'] );
    Route::post('/warna/update', [WarnaController::class, 'update'] );
    // Route::get('/warna/hapuswarna{ID_WARNA}', [WarnaController::class, 'delete'] );
    // Route::delete('/warna/hapuswarna{ID_WARNA}', [WarnaController::class, 'delete'] );
    // Route::get('/warna/hapuswarna{ID_WARNA}', [WarnaController::class, 'hapus'] );
    Route::delete('/warna/hapuswarna{ID_WARNA}', [WarnaController::class, 'hapus'] );
    Route::get('/warna/trashwarna', [WarnaController::class, 'trash'] );
    Route::get('/warna/restorewarna{ID_WARNA?}', [WarnaController::class, 'restore'] );
    Route::get('/warna/deletewarna{ID_WARNA?}', [WarnaController::class, 'delete'] );


    Route::get('/historystock', [HistorystockController::class, 'index'] );
    Route::get('/historystock/cari', [HistorystockController::class, 'cari'] );
    Route::get('/historystock/addstock', [HistorystockController::class, 'add'] );
    Route::post('/historystock/store', [HistorystockController::class, 'store'] );
    Route::get('/historystock/editstock{ID_HS}', [HistorystockController::class, 'edit'] );
    Route::post('/historystock/updatestock', [HistorystockController::class, 'update'] );
    // Route::get('/historystock/hapusstock{ID_HS}', [HistorystockController::class, 'delete'] );
    // Route::delete('/historystock/hapusstock{ID_HS}', [HistorystockController::class, 'delete'] );
    // Route::get('/historystock/hapusstock{ID_HS}', [HistorystockController::class, 'hapus'] );
    Route::delete('/historystock/hapusstock{ID_HS}', [HistorystockController::class, 'hapus'] );
    Route::get('/historystock/trashstock', [HistorystockController::class, 'trash'] );
    Route::get('/historystock/restorestock{ID_HS?}', [HistorystockController::class, 'restore'] );
    Route::get('/historystock/deletestock{ID_HS?}', [HistorystockController::class, 'delete'] );


    Route::get('/pembayaran', [BayarController::class, 'index'] );
    Route::get('/pembayaran/cari', [BayarController::class, 'cari'] );
    Route::get('/pembayaran/addbayar', [BayarController::class, 'add'] );
    Route::post('/pembayaran/store', [BayarController::class, 'store'] );
    Route::get('/pembayaran/editbayar{ID_BAYAR}', [BayarController::class, 'edit'] );
    Route::post('/pembayaran/updatebayar', [BayarController::class, 'update'] );
    // Route::get('/pembayaran/hapusbayar{ID_BAYAR}', [BayarController::class, 'delete'] );
    // Route::delete('/pembayaran/hapusbayar{ID_BAYAR}', [BayarController::class, 'delete'] );
    // Route::get('/pembayaran/hapusbayar{ID_BAYAR}', [BayarController::class, 'hapus'] );
    Route::delete('/pembayaran/hapusbayar{ID_BAYAR}', [BayarController::class, 'hapus'] );
    Route::get('/pembayaran/trashbayar', [BayarController::class, 'trash'] );
    Route::get('/pembayaran/restorebayar{ID_BAYAR?}', [BayarController::class, 'restore'] );
    Route::get('/pembayaran/deletebayar{ID_BAYAR?}', [BayarController::class, 'delete'] );
    Route::get('/pembayaran/cetakbayar', [BayarController::class, 'cetak'] );



    // DETAIL BARANG //
    Route::get('/detailBarang/index/{KODE_BARANG}', [detailBarangController::class,'index']);
    Route::get('/detailBarang/index/create/{KODE_BARANG}', [detailBarangController::class,'create']);
    Route::post('/detailBarang/store', [detailBarangController::class,'store']);
    Route::get('/detailBarang/edit/{KODE_BARANG}', [detailBarangController::class,'edit']);
    Route::post('/detailBarang/update/{KODE_BARANG}', [detailBarangController::class,'update']);
    Route::delete('/detailBarang/hapusdetbar{KODE_BARANG}', [detailBarangController::class, 'delete'] );
    // Route::get('/detailBarang/trashdetbar', [detailBarangController::class, 'trash'] );
    // Route::get('/detailBarang/restoredetbar{KODE_BARANG?}', [detailBarangController::class, 'restore'] );
    // Route::get('/detailBarang/deletedetbar{KODE_BARANG?}', [detailBarangController::class, 'delete'] );


    // DETAIL PEMESANAN //
    Route::get('/detailPemesanan/index/{ID_PESAN}', [detailPemesananController::class,'index']);
    Route::get('/detailPemesanan/index/create/{ID_PESAN}', [detailPemesananController::class,'create']);
    Route::post('/detailPemesanan/store', [detailPemesananController::class,'store']);
    Route::get('/detailPemesanan/edit/{ID_PESAN}', [detailPemesananController::class,'edit']);
    Route::post('/detailPemesanan/update/{ID_PESAN}', [detailPemesananController::class,'update']);
    Route::delete('/detailPemesanan/hapusdetpes{ID_PESAN}', [detailPemesananController::class, 'delete'] );


    // DETAIL PENERIMAAN //
    Route::get('/detailPenerimaan/index/{ID_TERIMA}', [detailPenerimaanController::class,'index']);
    Route::get('/detailPenerimaan/index/create/{ID_TERIMA}', [detailPenerimaanController::class,'create']);
    Route::post('/detailPenerimaan/store', [detailPenerimaanController::class,'store']);
    Route::get('/detailPenerimaan/edit/{ID_TERIMA}', [detailPenerimaanController::class,'edit']);
    Route::post('/detailPenerimaan/update/{ID_TERIMA}', [detailPenerimaanController::class,'update']);
    Route::delete('/detailPenerimaan/hapusdetter{ID_TERIMA}', [detailPenerimaanController::class, 'delete'] );
    

});
