<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as HC;
use App\Http\Controllers\ResepsionisController as RC;

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
    return view('welcome');
});

Auth::routes();


Auth::routes();

Route::get('/', [HC::class, 'welcome'])->name('welcome');
Route::get('/home', [HC::class, 'index'])->name('home');
Route::get('/user/log', [HC::class, 'log'])->name('log');
Route::get('/standart/{id}', [HC::class, 'tostandart'])->name('tostandart');
Route::get('/exclusive/{id}', [HC::class, 'toexclusive'])->name('toexclusive');
Route::get('/president/{id}', [HC::class, 'topresident'])->name('topresident');
Route::patch('/totransaksi/{id}', [HC::class, 'totransaksi'])->name('totransaksi');
Route::get('/transaksi', [HC::class, 'transaksi'])->name('transaksi');
Route::post('/pembayaran', [HC::class, 'pembayaran'])->name('pembayaran');

Route::get('/history', [HC::class, 'history'])->name('history');
Route::get('/transaksi/all', [HC::class, 'ketransaksi'])->name('ketransaksi');
Route::get('/transaksi/detail/{id}', [HC::class, 'detailtransaksi'])->name('detailtransaksi');
Route::get('/pembayaran/all', [HC::class, 'kepembayaran'])->name('kepembayaran');
Route::get('/pembayaran/detail/{id}', [HC::class, 'detapembayaran'])->name('detapembayaran');


##ADMIN
Route::get('/admin', [HC::class, 'indexa'])->name('indexa');
Route::get('/admin/tkamar/{id}', [HC::class, 'tkamar'])->name('tkamar');
Route::post('/admin/post/{id}', [HC::class, 'pkamar'])->name('pkamar');
Route::get('/admin/utkamar/{id}', [HC::class, 'utkamar'])->name('utkamar');
Route::post('/admin/post/total/{id}', [HC::class, 'upkamar'])->name('upkamar');
##admin fasilitas
Route::get('/admin/fasilitas', [HC::class, 'ifasilitas'])->name('ifasilitas');
Route::get('/admin/fasilitas/update/{id}', [HC::class, 'tofasilitas'])->name('tofasilitas');
Route::post('/admin/fasilitas/total/{id}', [HC::class, 'upfasilitas'])->name('upfasilitas');
##Amdin Fasilitas Umum
Route::get('/admin/fasilitasu', [HC::class, 'umfasilitas'])->name('umfasilitas');


##Reservation
Route::get('/reservation', [RC::class, 'indexres'])->name('reservation');
Route::get('/reservation/log', [RC::class, 'log'])->name('logall');
Route::get('/data/reservation', [RC::class, 'datares'])->name('datares');
Route::get('/data/verif', [RC::class, 'verif'])->name('verif');
Route::get('/data/update/{id}', [RC::class, 'verifa'])->name('verifa');
Route::get('/data/cek', [RC::class, 'cek'])->name('cek');
Route::get('/data/cekin/{id}', [RC::class, 'cek_in'])->name('cek_in');
Route::get('/data/cek_out/{id}', [RC::class, 'cek_out'])->name('cek_out');
Route::get('/data/tocekin', [RC::class, 'tocekin'])->name('tocekin');
Route::get('/data/tocekout', [RC::class, 'tocekout'])->name('tocekout');




