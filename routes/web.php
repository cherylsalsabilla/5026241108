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


// Route::get('/pegawai', [PegawaiDBController::class, 'index']);
// Route::get('/pegawai/cari', [PegawaiDBController::class, 'cari']);

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



use App\Http\Controllers\SiswaController;

//route CRUD siswa
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/{nrp}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/{nrp}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{nrp}', [SiswaController::class, 'destroy'])->name('siswa.destroy');


//Tugas Latihan
use App\Http\Controllers\NilaiController;
//route CRUD nilai
Route::get('/nilaisiswa', [NilaiController::class, 'index'])->name('nilai.index');
Route::get('/nilaisiswa/create', [NilaiController::class, 'create'])->name('nilai.create');
Route::post('/nilaisiswa', [NilaiController::class, 'store'])->name('nilai.store');
