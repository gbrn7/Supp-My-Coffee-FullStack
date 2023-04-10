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
         Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('admin.produk.edit');
         Route::put('/update/{id}', [ProdukController::class, 'update'])->name('admin.produk.update');
         Route::delete('/destroy/{id}', [ProdukController::class, 'destroy'])->name('admin.produk.destroy');
      });
   });