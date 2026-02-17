<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/inicio');

Route::livewire('/inicio', 'pages::inicio.index')
    ->name('inicio');

Route::livewire('/components/buttons', 'pages::components.index')
    ->name('components.buttons');
