<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home',);
});

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');
Route::middleware('auth')->post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/users', function () {
        // dd(User::paginate(10));
        return Inertia::render('Users/Index', [
            'users' => User::query()
                ->select('id', 'name')
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'can' => [
                        'edit' => Auth::user()->can('edit', $user)
                    ]
                ]),
            'filters' => Request::only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create', User::class)
            ]
        ]);
    })->name('user-list');

    Route::get('/users/create', function () {
        return Inertia::render('Users/Create');
    })->name('user.create')->can('create', 'App\Models\User');

    Route::get('/users/edit/{user}', function (User $user) {
        return Inertia::render('Users/Edit', ["data" => $user]);
    })->name('user.create')->can('create', 'App\Models\User');

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

    Route::patch('/users/{user}', function (User $user) {
        //validate
        $validated = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => ['string', 'nullable'],
        ]);

        //create user
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if(!empty($validated['password']))
            $user->password = Hash::make($validated['password']);

        $user->update();
        return redirect(route('user-list'));
    })->name('user-update');


    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });
});
