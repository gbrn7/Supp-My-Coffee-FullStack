<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataAdminController;
use App\Http\Controllers\Customer\indexController;
use App\Http\Controllers\Customer\catalogController;
use App\Http\Controllers\Customer\detailProdukController;
use App\Http\Controllers\Customer\accountController;
use App\Http\Controllers\Customer\subscribeController;
use App\Http\Controllers\Customer\customerLoginController;
use App\Http\Controllers\Customer\rajaOngkirController;
use App\Http\Controllers\Customer\checkoutController;
use App\Http\Controllers\Customer\RegisterController;
use App\Http\Controllers\Customer\socialAuthController;
use App\Http\Controllers\Customer\dateController;
use App\Http\Controllers\Customer\transactionController as customerTransaksiController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\laporanController;
use App\Http\Controllers\Admin\RekapController;
use App\Http\Livewire\VisualisasiData;

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

// Route::get('/catalog', function () {
//    return view('');
// });

   // Login Route (member)
   Route::get('/login', [customerLoginController::class, 'index'])->name('customer.login');
   Route::post('/login', [customerLoginController::class, 'authenticate'])->name('customer.login.authenticate');
   Route::get('/logout', [customerLoginController::class, 'logout'])->name('customer.logout');
   Route::get('/payment-finish', [customerTransaksiController::class, 'paymentFinish'])->name('customer.payment-finish');
   Route::get('/login-google', [socialAuthController::class, 'redirectToProvider'])->name('customer.login.google');
   Route::get('/auth/google/callback', [socialAuthController::class, 'handlerCallBack'])->name('customer.login.callBack');
   
   // Login Route (admin)
   Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin.login');
   Route::post('admin/login', [AdminLoginController::class, 'authenticate'])->name('admin.login.authenticate');
   Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
   
   //Register Route
   Route::get('/register', [RegisterController::class, 'index'])->name('regisPage');
   Route::post('/register', [RegisterController::class, 'store'])->name('regis.store');

   Route::get('/', [indexController::class, 'index'])->name('customer.index');

   Route::group(['prefix' => 'customer'], function(){

      Route::group(['prefix' => 'catalog'], function(){
         Route::get('/', [catalogController::class, 'index'])->name('customer.catalog');
         Route::get('/{id}', [detailProdukController::class, 'index'])->name('customer.catalog.detail');
         Route::post('/search', [catalogController::class, 'search'])->name('customer.catalog.search');
         Route::get('/searchByCat/{category}', [catalogController::class, 'searchByCategory'])->name('customer.catalog.searchByCategory');
      });
      
      Route::get('/account', [accountController::class, 'index'])->name('customer.account')->middleware('cust.auth');
      
      Route::post('/account/update', [accountController::class, 'updateDataUser'])->name('customer.account.update')->middleware('cust.auth');
      
      Route::post('/subcribe', [subscribeController::class, 'index'])->name('customer.subscribe')->middleware('cust.auth');
      
      Route::post('/checkout', [checkoutController::class, 'index'])->name('customer.checkout')->middleware('cust.auth');
      
      Route::post('/checkout/transaction', [customerTransaksiController::class, 'index'])->name('customer.transaction')->middleware('cust.auth');
   });

   Route::group(['prefix' => 'admin', 'middleware' => ['admin.auth']], function (){
      Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
      
      // Produk Route
      Route::group(['prefix' => 'produk'], function(){
         Route::get('/', [ProdukController::class, 'index'])->name('admin.produk');
         Route::get('/create', [ProdukController::class, 'create'])->name('admin.produk.create');
         Route::post('/store', [ProdukController::class, 'store'])->name('admin.produk.store');
         Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('admin.produk.edit');
         Route::put('/update/{id}', [ProdukController::class, 'update'])->name('admin.produk.update');
         Route::POST('/destroy/{id}', [ProdukController::class, 'destroy'])->name('admin.produk.destroy');
      });

      // Data Admin Route
      Route::group(['prefix' => 'dataAdmin'], function(){
         Route::get('/', [DataAdminController::class, 'index'])->name('admin.dataAdmin');
         Route::get('/create', [DataAdminController::class, 'create'])->name('admin.dataAdmin.create');
         Route::post('/store', [DataAdminController::class, 'store'])->name('admin.dataAdmin.store');
         Route::get('/edit/{id}', [DataAdminController::class, 'edit'])->name('admin.dataAdmin.edit');
         Route::put('/update/{id}', [DataAdminController::class, 'update'])->name('admin.dataAdmin.update');
         Route::POST('/destroy/{id}', [DataAdminController::class, 'destroy'])->name('admin.dataAdmin.destroy');
      });

      // Transaksi Route
      Route::get('/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi');

      // Jadwal Route
      Route::group(['prefix' => 'jadwal'], function(){
         Route::get('/', [JadwalController::class, 'index'])->name('admin.jadwal');
         Route::put('/update/{id}', [JadwalController::class, 'update'])->name('admin.jadwal.update');
      });

      //Laporan Penjualan Route
      Route::get('/laporanPenjualan', [laporanController::class, 'index'])->name('admin.laporanPenjualan');
      
      Route::Post('/laporanPenjualan', [laporanController::class, 'getData'])->name('admin.laporanPenjualan.filter');
      
      Route::Post('/printPdf', [laporanController::class, 'printPdf'])->name('admin.laporanPenjualan.printPdf');
      
      //Visualisasi Data Route
      Route::get('/visualisasiData', VisualisasiData::class, 'render')->name('admin.visualisasiData');
      
      //Rekap Penjualan Route
      Route::group(['prefix' => 'rekap'], function(){
         Route::get('/', [RekapController::class, 'index'])->name('admin.rekap');
         Route::Post('/', [RekapController::class, 'getData'])->name('admin.rekap.filter');
         Route::put('/update/{id}', [RekapController::class, 'updateResi'])->name('admin.rekap.updateResi');
      });
   });

   // Get Region Data
   Route::get('/provinsi/{idProvinsi}/kota', [rajaOngkirController::class, 'getKabKot'])->name('getKabKota');
   
   // Get Paket
   Route::get('/asal/{idKotaAsal}/tujuan/{idKotaTujuan}/berat/{berat}/ekpedisi/{ekspedisi}', [rajaOngkirController::class, 'getPaket'])->name('getPaket');

   // Get Date
   Route::get('/getDate/{subs}/date/{subsdate}', [dateController::class, 'index'])->name('getDate');

   
   
   