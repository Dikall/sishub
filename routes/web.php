<?php

use Illuminate\Support\Facades\Route;
use App\Models\Alumni;
use App\Models\Ormawa;
use App\Http\Controllers\QrController;
use App\Livewire\Home;
use App\Livewire\InformasiJurusan;
use App\Livewire\KalenderKegiatan;
use App\Livewire\Alumni as AlumniLivewire;
use App\Livewire\OrganisasiMahasiswa;
use App\Livewire\MataKuliah;

Route::get('/main', function () {
    return view('layouts.main');
});

Route::get('/beranda', function () {
    return view('home');
});

Route::get('/', Home::class)->name('beranda');
Route::get('/informasi-jurusan', InformasiJurusan::class)->name('informasi-jurusan');
Route::get('/kalender-kegiatan', KalenderKegiatan::class)->name('kalender-kegiatan');
Route::get('/alumni', AlumniLivewire::class)->name('alumni');
Route::get('/organisasi-mahasiswa', OrganisasiMahasiswa::class)->name('organisasi-mahasiswa');
Route::get('/mata-kuliah', MataKuliah::class)->name('mata-kuliah');

Route::get('/alumni-kita', function () {
    $alumni = Alumni::all();
    return view('alumni', compact('alumni'));
});

Route::get('/hmsi', function () {
    $ormawa = Ormawa::all();
    return view('ormawa', compact('ormawa'));
});

Route::get('/qr/{id}', [QrController::class, 'show'])->name('qr.show');