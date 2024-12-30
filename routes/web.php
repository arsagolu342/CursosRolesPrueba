<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get( '/dashboard', [RouteController::class, 'dashboard'])->name('dashboard');
    Route::get('/courses', [RouteController::class, 'courses'])->name('courses');
    Route::get( '/student', action: [RouteController::class, 'student'])->name('student');
    Route::get( '/videos/{id}', [RouteController::class, 'videos'])->name('videos');
 });
 Route::get( '/loginw', action: [RouteController::class, 'login'])->name('loginw');
 Route::get(  '/registerw', action: [RouteController::class, 'register'])->name('registerw');