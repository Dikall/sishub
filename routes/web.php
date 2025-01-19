<?php

use Illuminate\Support\Facades\Route;

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