<?php

use App\Livewire\Home\Index;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', Index::class)->name('home');

Route::get('/login', \App\Livewire\Auth\Login::class)->name('login');
Route::get('/register', \App\Livewire\Auth\Register::class)->name('register');

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', \App\Livewire\Dashboard\Index::class)->name('dashboard');
});
