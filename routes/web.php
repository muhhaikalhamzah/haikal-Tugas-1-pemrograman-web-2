<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/databantuan', function () {
    return view('databantuan.index', ['title' => 'APLIKASI BANSOS']);
});

Route::get('/databantuan/create', function () {
    return view('databantuan.create', ['title' => 'APLIKASI BANSOS']);
});
