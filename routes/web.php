<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/inicio');

Route::livewire('/inicio', 'pages::inicio.index')
    ->name('inicio');

Route::livewire('/components/buttons', 'pages::components.button.index')
    ->name('components.buttons');

Route::livewire('/mockups/table', 'pages::mockups.table')
    ->name('mockups.table');

Route::livewire('/mockups/form', 'pages::mockups.form')
    ->name('mockups.form');

Route::livewire('/mockups/settings', 'pages::mockups.settings')
    ->name('mockups.settings');
