<?php

use App\Http\Controllers\CommunityController;
use Illuminate\Support\Facades\Route;

// Home Route
Route::get('/', function () {
    return view('index');
})->name('home');

// Static Info Routes
Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/cara-main', function () {
    return view('cara-main');
})->name('cara-main');

Route::get('/kalkulator', function () {
    return view('kalkulator');
})->name('kalkulator');

Route::get('/strategi', function () {
    return view('strategi');
})->name('strategi');

Route::get('/solusi-lab', function () {
    return view('solusi-lab');
})->name('solusi-lab');

Route::get('/galeri-swag', function () {
    return view('galeri-swag');
})->name('galeri-swag');

Route::get('/qna', function () {
    return view('qna');
})->name('qna');

Route::get('/panduan-skills', function () {
    return view('panduan-skills');
})->name('panduan-skills');

Route::get('/panduan-gear', function () {
    return view('panduan-gear');
})->name('panduan-gear');

// Community & Mutualan Routes (Dynamic)
Route::get('/komunitas', [CommunityController::class, 'index'])->name('komunitas');
Route::post('/komunitas/mutual', [CommunityController::class, 'storeMutual'])->name('komunitas.mutual');

// Kalkulator & Leaderboard API Routes
Route::get('/api/hitung-poin', [\App\Http\Controllers\KalkulatorController::class, 'hitungPoin']);
Route::get('/api/leaderboard', [\App\Http\Controllers\KalkulatorController::class, 'leaderboard']);
Route::get('/api/sync-all', [\App\Http\Controllers\KalkulatorController::class, 'syncAll']);
Route::get('/api/avatar', [\App\Http\Controllers\KalkulatorController::class, 'avatar']);

