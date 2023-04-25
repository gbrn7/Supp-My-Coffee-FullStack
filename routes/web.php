<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Customer\indexController;
use App\Http\Controllers\Customer\catalogController;
use App\Http\Controllers\Customer\detailProdukController;
use App\Http\Controllers\Customer\customerLoginController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\RegisterController;

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

   Route::get('/', [indexController::class, 'index'])->name('customer.index');

   
   Route::group(['prefix' => 'catalog'], function(){
      Route::get('/', [catalogController::class, 'index'])->name('customer.catalog');
      Route::get('/{id}', [detailProdukController::class, 'index'])->name('customer.catalog.detail');
      Route::post('/search', [catalogController::class, 'search'])->name('customer.catalog.search');
      Route::get('/categories/{category}', [catalogController::class, 'categories'])->name('customer.catalog.category');
   });

   Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function (){
      Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
      
      // Produk Route
      Route::group(['prefix' => 'produk'], function(){
         Route::get('/', [ProdukController::class, 'index'])->name('admin.produk');
         Route::get('/create', [ProdukController::class, 'create'])->name('admin.produk.create');
         Route::post('/store', [ProdukController::class, 'store'])->name('admin.produk.store');
         Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('admin.produk.edit');
         Route::put('/update/{id}', [ProdukController::class, 'update'])->name('admin.produk.update');
         Route::delete('/destroy/{id}', [ProdukController::class, 'destroy'])->name('admin.produk.destroy');
      });

      // Transaksi Route
      Route::get('/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi');

      // Jadwal Route
      Route::group(['prefix' => 'jadwal'], function(){
         Route::get('/', [JadwalController::class, 'index'])->name('admin.jadwal');
         Route::put('/update/{id}', [JadwalController::class, 'update'])->name('admin.jadwal.update');
      });  
   });

      // Login Route (member)
      Route::get('/login', [customerLoginController::class, 'index'])->name('customer.login');
      Route::post('/login', [customerLoginController::class, 'authenticate'])->name('customer.login.authenticate');
      Route::get('/logout', [customerLoginController::class, 'logout'])->name('customer.logout');
      
      // Login Route (admin)
      Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin.login');
      Route::post('admin/login', [AdminLoginController::class, 'authenticate'])->name('admin.login.authenticate');
      Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
      
      //Register Route
      Route::get('/register', [RegisterController::class, 'index'])->name('regisPage')->middleware('guest');
      Route::post('/register', [RegisterController::class, 'store'])->name('regis.store');
      
      //Logout Route