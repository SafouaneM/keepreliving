<?php

use App\Livewire\Home\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class)->name('home');
