<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Users/Index', [
        'name' => 'Me',
    ]);
});

Route::get('/second-link', fn() => 'second link!')->name('second');
