<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\Auth\LoginController;







use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\Admin\VisitController;
use App\Http\Controllers\Admin\VisitController as AdminVisitController;
use App\Models\Feedback;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/download/surat', function () {
    return response()->download(public_path('files/surat-permohonan.docx'));
});

Route::get('/form', [FeedbackController::class, 'create'])->name('form');  
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');


Route::get('/form', [SubmissionController::class, 'create'])->name('form');  
Route::post('/submission', [SubmissionController::class, 'store'])->name('submission.store');


