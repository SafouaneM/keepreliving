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
        Route::get('/folders', \App\Livewire\Folder\Index::class)->name('folders');
        Route::get('/folders/create', \App\Livewire\Folder\Create::class)->name('folders.create');
        Route::get('/folders/{folder}', \App\Livewire\Folder\Show::class)->name('folders.show');
    });
});


Route::get('/toast-test', function () {
    return view('toast-test');
});
