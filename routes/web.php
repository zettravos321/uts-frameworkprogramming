<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

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

Route::get('/', [BukuController::class, 'list']);

Route::get('/list-buku', [BukuController::class, 'list']);

Route::get('/tambah-buku', function () {
    return view('tambah-buku');
});
Route::post('/simpan-buku', [BukuController::class, 'simpan']);
Route::get('/hapus-buku/{id}', [BukuController::class, 'hapus']);
Route::get('/ubah-buku/{id}', [BukuController::class, 'ubah']);
Route::post('/ubah-buku', [BukuController::class, 'rubah']);
