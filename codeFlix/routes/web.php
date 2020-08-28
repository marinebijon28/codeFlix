<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;


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
/**
 * @return view first view
 */
Route::get('/', function () {
    return view('homeView');
});

/**
 * @return view sign up
 */
Route::get('/signup', function() {
    return view('signup');
});

/**
 * @return logout
 */
Route::get('/logout', function() {
   return redirect('login');
});

/**
 * treatment of informtations for inscription
 * @return view first view
 */
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

/**
 * @return view log in
 */
Route::get('/login', function () {
    return view('/login');
});

/**
 * test if exist in database
 * @return if exist return view dashboard or view login
 */
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

/**
 * verified email link if verified il test to log in
 * @return if login return view dashboard or login
 */
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

/**
 * recovered all informations for the view
 * @return view mediaWatch
 */
Route::get('mediaWatch/{title}', function($title) {
    $search = request('title');
    $numberSeason = request('season');
    if (!isset($numberSeason))
        $numberSeason = 1;
    if (!isset($title)){
        $results = \Illuminate\Support\Facades\DB::select('SELECT * FROM media where title LIKE "' . $title . '"');
    }else
        $results = \Illuminate\Support\Facades\DB::select('SELECT * FROM media where title LIKE "' . $search . '"');
    $res = \Illuminate\Support\Facades\DB::select('SELECT * FROM serie where name_serie LIKE "' . $search . '" AND number_season = ' . "1" . ' AND number_episode = ' . "1");
    return view('mediaWatch')->with('results', $results)->with('search', $search)->with('seasons', $numberSeason)->with('movie', $res);
});


/**
 * recovered all informations for the view
 * @return view mediaWatch
 */
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
    if (isset($title) == true && isset($numberSeason) == true && isset($numberSeason) == true){
        $res = \Illuminate\Support\Facades\DB::select('SELECT * FROM serie where name_serie LIKE "' . $title . '" AND number_season = ' . $numberSeason . ' AND number_episode = ' . $numberEpisode);
    }else if (isset($search) == true && isset($numberSeason) == true && isset($numberSeason) == true)
        $res = \Illuminate\Support\Facades\DB::select('SELECT * FROM serie where name_serie LIKE "' . $search . '" AND number_season = ' . $numberSeason . ' AND number_episode = ' . $numberEpisode);
    else
        $res = \Illuminate\Support\Facades\DB::select('SELECT * FROM serie where name_serie LIKE "' . $search . '" AND number_season = ' . "1" . ' AND number_episode = ' . "1");
    return view('mediaWatch')->with('movie', $res)->with('results', $results)->with('search', $search)->with('seasons', $numberSeason);
});

/**
 * recovered the title of movie
 * @return view mediaWatch
 */
Route::get('/mediaListView', function() {
    $search = request('title');
    $medias = \Illuminate\Support\Facades\DB::select('SELECT * FROM media where title LIKE "' . $search . '%"');
    return view('/mediaListView')->with('medias', $medias)->with('search', $search);
});

/**
 * @return view contact us
 */
Route::get('/contactUs', function () {
    return view('/contactUs');
});

/**
 * recovered als informations for the view
 * @return view contact us
 */
Route::post('/contactUs', function() {
    $firstname = request('firstname');
    $name = request('name');
    $body = request('message');

    \Illuminate\Support\Facades\Mail::send('email.contactUs', ["firstname" => $firstname, "name" => $name, "body" => $body], function($mail) {
        $mail->to("contact@codflix.com");

    });
    return view('/contactUs');
});
