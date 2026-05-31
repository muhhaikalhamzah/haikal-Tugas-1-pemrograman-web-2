<?php

use App\Http\Controllers\DatabantuanController;
use App\Http\Controllers\PenerimabantuanController;
use App\Http\Controllers\DesaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DatabantuanController::class, 'index']);
Route::get('/databantuan', [DatabantuanController::class, 'index'])->name('databantuan.index');
Route::get('/databantuan/create', [DatabantuanController::class, 'create'])->name('databantuan.create');
Route::post('/databantuan/store', [DatabantuanController::class, 'store'])->name('databantuan.store');


Route::get('desa/index', [DesaController::class, 'index'])->name('desa.index');
Route::get('/desa/create', [DesaController::class, 'create'])->name('desa.create');
Route::post('/desa/store', [DesaController::class, 'store'])->name('desa.store');
Route::get('/desa/{desa}/edit', [DesaController::class, 'edit'])->name('desa.edit');
Route::put('/desa/{desa}', [DesaController::class, 'update'])->name('desa.update');
Route::delete('/desa/{desa}', [DesaController::class, 'destroy'])->name('desa.destroy');
Route::get('/desa/{desa}', [DesaController::class, 'show'])->name('desa.show');

Route::get('/penerimabantuan', [PenerimabantuanController::class, 'index'])->name('penerimabantuan.index');
Route::get('/penerimabantuan/create', [PenerimabantuanController::class, 'create'])->name('penerimabantuan.create');
Route::post('/penerimabantuan/store', [PenerimabantuanController::class, 'store'])->name('penerimabantuan.store');
Route::get('/penerimabantuan/{penerimabantuan}/edit', [PenerimabantuanController::class, 'edit'])->name('penerimabantuan.edit');
Route::put('/penerimabantuan/{penerimabantuan}', [PenerimabantuanController::class, 'update'])->name('penerimabantuan.update');


Route::get('/databantuan/{databantuan}/edit', [DatabantuanController::class, 'edit'])->name('databantuan.edit');
Route::put('/databantuan/{databantuan}', [DatabantuanController::class, 'update'])->name('databantuan.update');
Route::delete('/databantuan/{databantuan}', [DatabantuanController::class, 'destroy'])->name('databantuan.destroy');
