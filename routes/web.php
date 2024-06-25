<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home',);
});

Route::get('/users', function () {
    // dd(User::paginate(10));
    return Inertia::render('Users', [
        'users' => User::paginate(10)->through(fn ($user) => [
            'id' => $user->id,
            'name' => $user->name
        ])
    ]);
});

Route::get('/settings', function () {
    return Inertia::render('Settings');
});

Route::post('/logout', function () {
    dd(request("foo"));
});
