<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\VisitController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubmissionController;






use App\Http\Controllers\Admin\VisitController as AdminVisitController;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/form', [SubmissionController::class, 'create'])->name('form');  
Route::post('/submission', [SubmissionController::class, 'store'])->name('submission.store');

// // Menampilkan form
// Route::get('/form', [SubmissionController::class, 'create']);

// // Menyimpan data dari form
// Route::post('/submission', [SubmissionController::class, 'submission.store']);


// Route::post('/submission/store', [SubmissionController::class, 'store'])->name('submission.store');
// Route::view('/form', 'form'); // Untuk menampilkan halaman form


// Route::get('/form', [SubmissionController::class, 'create'])->name('submission.create');
// Route::post('/form', [SubmissionController::class, 'store'])->name('submission.store');

// Route::get('/form', [BookingController::class, 'form'])->name('form');
