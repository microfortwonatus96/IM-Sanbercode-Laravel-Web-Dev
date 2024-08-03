<?php

use App\Http\Controllers\CastController;
use App\Http\Controllers\GenreController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/table', function () {
    return view('layout.table');
});
Route::get('/dataTable', function () {
    return view('layout.dataTable');
});

// Tambah Data genre
Route::get('/genre/tambah', [GenreController::class, 'tambah']);

// mengirim inputan ke database tabel genre
Route::post('/genre', [GenreController::class, 'genre']);

// Create Data cast
// menampilkan form untuk membuat data pemain film baru
Route::get('/cast/create', [CastController::class, 'tambah']);

// mengirim inputan ke database tabel cast/menyimpan data baru ke tabel Cast
Route::post('/cast', [CastController::class, 'cast']);

//menampilkan semua data tabel cast/menampilkan list data para pemain film 
Route::get('/cast', [CastController::class, 'index']);

//Read Data Cast
//ambil detail data berdasarkan params/menampilkan detail data pemain film dengan id tertentu
Route::get('/cast/{cast_id}', [CastController::class, 'detail']);

// Update data cast
// menampilkan form untuk edit pemain film dengan id tertentu
Route::get('/cast/{cast_id}/edit', [CastController::class, 'edit']);
Route::put('/cast/{cast_id}', [CastController::class, 'update']);

// Delete data cast
// menghapus data pemain film dengan id tertentu 
Route::delete('/cast/{cast_id}', [CastController::class, 'delete']);

