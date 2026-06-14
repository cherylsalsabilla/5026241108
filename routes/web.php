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

//Tugas Pertemuan 7
Route::get('pert-1', function () {
    return view('tugas.pertemuan1');
});
Route::get('pert-2/part1', function () {
    return view('tugas.pertemuan2-part1');
});
Route::get('pert-2/part2', function () {
    return view('tugas.pertemuan2-part2');
});
Route::get('pert-3/responsive', function () {
    return view('tugas.pertemuan3-responsive');
});
Route::get('pert-3/template', function () {
    return view('tugas.pertemuan3-template');
});
Route::get('pert-3/tugas', function () {
    return view('tugas.pertemuan3-tugas');
});
Route::get('pert-4', function () {
    return view('tugas.pertemuan4');
});
Route::get('pert-5', function () {
    return view('tugas.pertemuan5');
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


//Tugas Latihan Perempuan
use App\Http\Controllers\NilaiController;
//route CRUD nilai
Route::get('/nilaikuliah', [NilaiController::class, 'index'])->name('nilai.index');
Route::get('/nilaikuliah/create', [NilaiController::class, 'create'])->name('nilai.create');
Route::post('/nilaikuliah', [NilaiController::class, 'store'])->name('nilai.store');


//Tugas Latihan Laki-laki
use App\Http\Controllers\KeranjangController;
//route CRUD keranjang
Route::get('/keranjangbelanja', [KeranjangController::class, 'index'])->name('keranjang.index');
Route::post('/keranjangbelanja', [KeranjangController::class, 'store'])->name('keranjang.store');
Route::get('/keranjangbelanja/{ID}/beli', [KeranjangController::class, 'beli'])->name('keranjang.beli');
Route::put('/keranjangbelanja/{ID}', [KeranjangController::class, 'update'])->name('keranjang.update');
Route::delete('/keranjangbelanja/{ID}', [KeranjangController::class, 'batal'])->name('keranjang.batal');



//Tugas Pra EAS: Tas
use App\Http\Controllers\TasController;
//route CRUD tas
Route::get('/tas', [TasController::class, 'index'])->name('tas.index');
Route::post('/tas', [TasController::class, 'store'])->name('tas.store');
Route::put('/tas/{KodeTas}', [TasController::class, 'update'])->name('tas.update');
Route::delete('/tas/{KodeTas}', [TasController::class, 'hapus'])->name('tas.hapus');
Route::get('/tastambah', [TasController::class, 'tambah'])->name('tas.tambah');
Route::get('/tasedit/{KodeTas}', [TasController::class, 'edit'])->name('tas.edit');
Route::get('/tascari', [TasController::class, 'cari'])->name('tas.cari');
