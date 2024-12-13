<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengumumanController;
Route::get('/pengumuman',[PengumumanController::class,'index']);
Route::get('/entry',[PengumumanController::class,'entry']);
Route::get('/edit{id}',[PengumumanController::class,'edit']);
Route::get('/hapus{id}',[PengumumanController::class,'hapus']);
Route::get('/update{id}',[PengumumanController::class,'update']);
Route::get('/store',[PengumumanController::class,'store']);
Route::get('/cetak',[PengumumanController::class,'cetak']);
Route::get('/', function () {
    return view('welcome');
});


