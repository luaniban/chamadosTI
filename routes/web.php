<?php

use Livewire\Livewire;
use App\Livewire\ChamadoIndex;
use App\Livewire\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');


    Route::get('/dashboard', Index::class)->name('dashboard');
    Route::get('/', ChamadoIndex::class)->name('index');
});
