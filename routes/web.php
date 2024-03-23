<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\admin;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

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
//Login || Daftar
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/validasilogin', [LoginController::class, 'validasilogin'])->name('validasilogin');
});
Route::get('/', function () {
    return redirect('/dashboardpelanggan');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // pelanggan
    Route::get('/produk', [BarangController::class, 'produk'])->name('produk')->middleware('userAkses:1');
    Route::get('/pesanan', [Controller::class, 'pesanan'])->name('pesanan')->middleware('userAkses:1');
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang')->middleware('userAkses:1');
    Route::get('/profilpelanggan', [Controller::class, 'profilpelanggan'])->name('profilpelanggan')->middleware('userAkses:1');
    Route::get('/admin/editprofil/{id}', [UserController::class, 'editprofil'])->name('editprofil')->middleware('userAkses:1');


    // Pemilik
    Route::get('/dashboardpemilik', [Controller::class, 'dashboardpemilik'])->name('dashboardpemilik')->middleware('userAkses:3');
    Route::get('/laporan', [Controller::class, 'laporan'])->name('laporan')->middleware('userAkses:3');
    Route::get('/harian', [TransaksiController::class, 'harian'])->name('harian')->middleware('userAkses:3');
    Route::get('/bulanan', [TransaksiController::class, 'bulanan'])->name('bulanan')->middleware('userAkses:3');
    Route::get('/tahunan', [TransaksiController::class, 'tahunan'])->name('tahunan')->middleware('userAkses:3');
    Route::get('/datamaster', [UserController::class, 'datamaster'])->name('datamaster')->middleware('userAkses:3');
    Route::get('/profilpemilik', [Controller::class, 'profilpemilik'])->name('profilpemilik')->middleware('userAkses:3');
    Route::get('/admin/editprofilpemilik/{id}', [UserController::class, 'editprofilpemilik'])->name('editprofilpemilik')->middleware('userAkses:3');


    // admin
    Route::get('/dashboardadmin', [Controller::class, 'dashboardadmin'])->name('dashboardadmin')->middleware('userAkses:2');
    Route::get('/transaksi', [Controller::class, 'transaksi'])->name('transaksi')->middleware('userAkses:2');
    Route::get('/barang', [BarangController::class, 'index'])->name('barang')->middleware('userAkses:2');
    Route::get('/pelanggan', [UserController::class, 'pelanggan'])->name('pelanggan')->middleware('userAkses:2');
    Route::get('/profiladmin', [Controller::class, 'profiladmin'])->name('profiladmin')->middleware('userAkses:2');
    Route::get('/admin/editprofiladmin/{id}', [UserController::class, 'editprofiladmin'])->name('editprofiladmin')->middleware('userAkses:2');


    //admin barang
    Route::get('/admin/addbarang', [BarangController::class, 'addModal'])->name('addModal')->middleware('userAkses:2');
    Route::post('/admin/addData', [BarangController::class, 'store'])->name('addData')->middleware('userAkses:2');
    Route::get('/admin/editbarang/{id}', [BarangController::class, 'show'])->name('editModal')->middleware('userAkses:2');
    Route::PUT('/admin/updatebarang/{id}', [BarangController::class, 'update'])->name('updatebarang')->middleware('userAkses:2');
    Route::get('/admin/deletebarang/{id}', [BarangController::class, 'destroy'])->name('deletebarang')->middleware('userAkses:2');

    //Keranjang
    Route::post('/co', [TransaksiController::class, 'co'])->name('co')->middleware('userAkses:1');
    Route::get('/detail/{id}', [KeranjangController::class, 'show'])->name('detail')->middleware('userAkses:1');
    Route::post('/addcart', [KeranjangController::class, 'store'])->name('addcart')->middleware('userAkses:1');
    Route::get('/admin/deletekrj/{id}', [KeranjangController::class, 'destroy'])->name('deletekrj')->middleware('userAkses:1');
});

//Umum
Route::get('/dashboardpelanggan', [Controller::class, 'dashboardpelanggan'])->name('dashboardpelanggan');
Route::get('/produk', [BarangController::class, 'produk'])->name('produk');
Route::get('/daftar', [LoginController::class, 'daftar'])->name('daftar');

//status transaksi
Route::get('/belumbayar', [TransaksiController::class, 'belumbayar'])->name('belumbayar');
Route::get('/diproses', [TransaksiController::class, 'diproses'])->name('diproses');
Route::get('/dikirim', [TransaksiController::class, 'dikirim'])->name('dikirim');
Route::get('/diterima', [TransaksiController::class, 'diterima'])->name('diterima');
Route::get('/retur', [TransaksiController::class, 'retur'])->name('retur');
Route::get('/batal', [TransaksiController::class, 'batal'])->name('batal');

//pesanan admin
Route::get('/antrian', [TransaksiController::class, 'antrian'])->name('antrian');
Route::get('/delivery', [TransaksiController::class, 'delivery'])->name('delivery');
Route::get('/selesai', [TransaksiController::class, 'selesai'])->name('selesai');
Route::get('/return', [TransaksiController::class, 'return'])->name('return');
Route::get('/fail', [TransaksiController::class, 'fail'])->name('fail');

//users
Route::get('/admin/adduser', [UserController::class, 'adduser'])->name('adduser');
Route::post('/admin/tambahDataUser', [UserController::class, 'store'])->name('tambahDataUser');
Route::post('/admin/daftar', [UserController::class, 'daftar'])->name('daftar');
Route::get('/admin/edituser/{id}', [UserController::class, 'show'])->name('edituser');
Route::PUT('/admin/updateuser/{id}', [UserController::class, 'update'])->name('updateuser');
Route::get('/admin/deleteuser/{id}', [UserController::class, 'destroy'])->name('deleteuser');



Route::post('/pay', [TransaksiController::class, 'createTransaction']);
Route::get('/detbb', [Controller::class, 'detbb'])->name('detbb');
