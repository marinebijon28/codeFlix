<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('homeView');
});

Route::get('/signup', function() {
    return view('signup');
});

Route::post('/signup', function() {
    request()->validate([
        'email' => ['required'], ['email'], ['unique'],
        'password' => ['required'],
        'password_confirm'=> ['required'], ['confirmed'],
    ]);
    \App\Users::Create([
    'email' => request('email'),
    'password' => hash('sha256', request('password')),
    ]);

    return view('homeView');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function() {
    request()->validate([
        'email' => ['required'], ['email'],
        'password' => ['required'],
    ]);

    auth()->attempt([
        'email' => request('email'),
        'password' => request('password'),
    ]);

    return view('dashboard');
});
