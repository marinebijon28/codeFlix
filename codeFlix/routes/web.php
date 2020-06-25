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

Route::get('/logout', function() {
   return view('login');
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
    $res = \Illuminate\Support\Facades\DB::select('SELECT * FROM users where email = "' . request('email') . '" AND password = "' . hash('sha256', request('password')) .'"');
    if (!empty($res))
        return view('dashboard');
    else

        return view('login');
});



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/confirm/{id}/{confirmed_email}', function($id, $verified_email) {
    $user = App\Users::where('id', $id)->where('email_verified', $verified_email)->first();
    if ($user)
    {
        $user->email_verified = null;

        $user->save();
        if (auth()->attempt([
            'email' => $user->email,
            'password' => $user->password,
        ]))
        return view('dashboard');
    }
    else
        return view('homeView');

});

Route::get('mediaWatch/{title}', function($title) {
    $search = request('title');
    $numberSeason = request('season');
    if (!isset($numberSeason))
        $numberSeason = 1;
    if (!isset($title)){
        $results = \Illuminate\Support\Facades\DB::select('SELECT * FROM media where title LIKE "' . $title . '"');
    }else
        $results = \Illuminate\Support\Facades\DB::select('SELECT * FROM media where title LIKE "' . $search . '"');
    return view('mediaWatch')->with('results', $results)->with('search', $search)->with('seasons', $numberSeason);
});

Route::post('mediaWatch/{title}', function($title) {
    $numberSeason = request('season');
    if (!isset($numberSeason))
        $numberSeason = 1;
    $numberEpisode = request('episode');
    $search = request('title');
    if (!isset($title))
         $results = \Illuminate\Support\Facades\DB::select('SELECT * FROM media where title LIKE "' . $title . '"');
    else
        $results = \Illuminate\Support\Facades\DB::select('SELECT * FROM media where title LIKE "' . $search . '"');
    var_dump($title);
    if (!isset($title) && !isset($numberSeason) && !isset($numberSeason)){
        $res = \Illuminate\Support\Facades\DB::select('SELECT * FROM serie where name_serie LIKE "' . $title . '" AND number_season = ' . $numberSeason . ' AND number_episode = ' . $numberEpisode);
    }else if (isset($search) && !isset($numberSeason) && !isset($numberSeason))
        $res = \Illuminate\Support\Facades\DB::select('SELECT * FROM serie where name_serie LIKE "' . $search . '" AND number_season = ' . $numberSeason . ' AND number_episode = ' . $numberEpisode);
    else
        $res = \Illuminate\Support\Facades\DB::select('SELECT * FROM serie where name_serie LIKE "' . $search . '" AND number_season = ' . "1" . ' AND number_episode = ' . "1");
    return view('mediaWatch')->with('movie', $res)->with('results', $results)->with('search', $search)->with('seasons', $numberSeason);
});


Route::get('/mediaListView', function() {
    $search = request('title');
    $medias = \Illuminate\Support\Facades\DB::select('SELECT * FROM media where title LIKE "' . $search . '%"');
    return view('/mediaListView')->with('medias', $medias)->with('search', $search);
});
