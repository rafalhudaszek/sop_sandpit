<?php

use App\Http\Controllers\CORSController;
use App\Http\Controllers\CSRFController;
use App\Http\Controllers\CSRFLoggedInController;
use App\Http\Controllers\SandpitController;
use App\Http\Controllers\SOPController;
use App\Http\Controllers\XSSController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';
Route::get('/', [SandpitController::class, 'index'])->name('sandpit');
Route::get('/SOP', [SOPController::class, 'index'])->name('SOP');
Route::get('/CORS', [CORSController::class, 'index'])->name('CORS');
Route::get('/CSRF', [CSRFController::class, 'index'])->name('CSRF');
Route::get('/CSRF-logged-in', [CSRFLoggedInController::class, 'index'])->middleware(['auth'])->name('CSRF-logged-in');
Route::get('/XSS', [XSSController::class, 'index']);
Route::post('/XSS', [XSSController::class, 'store']);
Route::get('/XSS/posts-with-special-chars', [XSSController::class, 'showWithSpecialChars']);
Route::get('/XSS/posts-without-special-chars', [XSSController::class, 'showWithoutSpecialChars']);
