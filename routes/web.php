<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', [StudentController::class, 'index']); // Rute untuk menampilkan index student
Route::resource('/student', StudentController::class);
