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
    $user = new \App\Users();
    $user->email = request('email');
    $user->password = hash('sha256', request('password'));
    $user->email_verified = str_replace('/', '', bcrypt(Str::random(16)));

    $user->save();
    $user->notify(new \App\Notifications\RegisteredUser());
    return view('homeView');
});

Route::get('/login', function () {
    return view('/login');
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



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/confirm/{id}/{confirmed_email}', function($id, $verified_email) {
    $user = App\Users::where('id', $id)->where('email_verified', $verified_email)->first();
    if ($user)
    {
        $user->update(['verified_email', null]);
        auth()->attempt([
            'email' => $user->email,
            'password' => $user->password,
        ]);
        return view('dashboard');
    }
    else
        return view('homeView');

});
