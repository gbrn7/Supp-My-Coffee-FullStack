<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProdukController;

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


   Route::group(['prefix' => 'admin'], function (){
      Route::view('/', 'admin.admin-dashboard')->name('admin.dashboard');
      
      Route::group(['prefix' => 'produk'], function(){
         Route::get('/', [ProdukController::class, 'index'])->name('admin.produk');
         Route::get('/create', [ProdukController::class, 'create'])->name('admin.produk.create');
         Route::post('/store', [ProdukController::class, 'store'])->name('admin.produk.store');
      });
   });