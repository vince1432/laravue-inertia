<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home',);
});

Route::get('/users', function () {
    // dd(User::paginate(10));
    return Inertia::render('Users/Index', [
        'users' => User::query()
            ->select('id', 'name')
            ->when(Request::input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString(),
        'filters' => Request::only(['search'])
    ]);
})->name('user-list');

Route::get('/users/create', function () {
    return Inertia::render('Users/Create');
})->name('user.create');

Route::post('/users', function () {
    //validate
    $validated = request()->validate([
        'name' => 'required',
        'email' => ['required', 'email'],
        'password' => 'required'
    ]);

    //create user
    $user = User::create($validated);

    return redirect(route('user-list'));
});


Route::get('/settings', function () {
    return Inertia::render('Settings');
});

Route::post('/logout', function () {
    dd(request("foo"));
});
