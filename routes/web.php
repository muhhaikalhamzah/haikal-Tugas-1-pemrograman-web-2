<?php
use App\Http\Controllers\DatabantuanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DatabantuanController::class, 'index']);
Route::get('/databantuan', [DatabantuanController::class, 'index'])->name('databantuan.index');
Route::get('/databantuan/create', [DatabantuanController::class, 'create'])->name('databantuan.create');
