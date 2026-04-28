<?php
use App\Http\Controllers\DatabantuanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DatabantuanController::class, 'index']);
Route::get('/databantuan', [DatabantuanController::class, 'index'])->name('databantuan.index');
Route::get('/databantuan/create', [DatabantuanController::class, 'create'])->name('databantuan.create');
Route::post('/databantuan/store', [DatabantuanController::class, 'store'])->name('databantuan.store');
Route::resource('databantuan', DatabantuanController::class);
Route::post('/databantuan/{databantuan}/edit', [DatabantuanController::class, 'edit'])->name('databantuan.edit');
Route::put('/databantuan/{databantuan}', [DatabantuanController::class, 'update'])->name('databantuan.update');
Route::delete('/databantuan/{databantuan}', [DatabantuanController::class, 'destroy'])->name('databantuan.destroy');