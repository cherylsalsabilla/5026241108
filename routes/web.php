<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\PegawaiDBController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('halo', function () {
	return "<h1>Halo, Selamat datang</h1> di tutorial laravel <i>www.malasngoding.com</i>";
});

Route::get('blog', function () {
    return view('blog');
});

//Tugas
Route::get('pert-1', function () {
    return view('pertemuan1');
});
Route::get('pert-2', function () {
    return view('pertemuan5');
});
Route::get('pert-3', function () {
    return view('pertemuan5');
});
Route::get('pert-4', function () {
    return view('pertemuan5');
});
Route::get('pert-5', function () {
    return view('pertemuan5');
});


Route::get('/pegawai', [PegawaiDBController::class, 'index']);
Route::get('/pegawai/cari', [PegawaiDBController::class, 'cari']);

Route::get('dosen', [DosenController::class, 'index']);
Route::get('biodata', [DosenController::class, 'biodata']);

//crud tabel pegawai
Route::get('/pegawai', [PegawaiDBController::class, 'index']);
Route::get('/pegawaitambah', [PegawaiDBController::class, 'tambah']);
Route::post('/pegawaistore', [PegawaiDBController::class, 'store']);
Route::get('/pegawaiedit/{id}', [PegawaiDBController::class, 'edit']);
Route::post('/pegawaiupdate', [PegawaiDBController::class, 'update']);
Route::get('/pegawaihapus/{id}', [PegawaiDBController::class, 'hapus']);
Route::get('/pegawaicari', [PegawaiDBController::class, 'cari']);
