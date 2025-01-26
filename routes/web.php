<?php

use Illuminate\Support\Facades\Route;
use App\Models\Alumni;
use App\Models\Ormawa;
use App\Http\Controllers\QrController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/main', function () {
    return view('main');
});

Route::get('/beranda', function () {
    return view('home');
});

Route::get('/informasi-jurusan', function () {
    return view('information');
});

Route::get('/kalender-kegiatan', function () {
    return view('calendar');
});

Route::get('/alumni-kita', function () {
    $alumni = Alumni::all();
    return view('alumni', compact('alumni'));
});

Route::get('/hmsi', function () {
    $ormawa = Ormawa::all();
    return view('ormawa', compact('ormawa'));
});

Route::get('/qr/{id}', [QrController::class, 'show'])->name('qr.show');