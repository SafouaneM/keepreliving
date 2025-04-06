<?php

use App\Http\Middleware\RedirectIfAuthenticated;
use App\Livewire\Home\Index;
use Illuminate\Support\Facades\Route;

Route::middleware([RedirectIfAuthenticated::class])->group(function () {
    Route::get('/', Index::class)->name('home');
    Route::get('register', \App\Livewire\Auth\Register::class)->name('register');
    Route::get('login', \App\Livewire\Auth\Login::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', \App\Livewire\Dashboard\Index::class)->name('dashboard');
    });
});
