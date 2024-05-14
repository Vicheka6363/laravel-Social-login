<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'App\Http\Controllers\HomeController@index');

Route::get('/login', function () {
    return view('login'); // Assuming your login.blade.php is in the `resources/views` directory
});

Route::get('/login/google', function () {
    return Socialite::driver('google')
        ->stateless()
        ->with(['prompt' => 'select_account']) 
        ->redirect(); // <-- Only one redirect() call
});

Route::get('/login/google/callback', function () {
    $googleUser = Socialite::driver('google')->stateless()->user();

    $user = User::updateOrCreate([
        'google_id' => $googleUser->id,
    ], [
        'name' => $googleUser->name,
        'email' => $googleUser->email,
        // 'google_token' => $googleUser->token,
        // 'google_refresh_token' => $googleUser->refreshToken,
    ]);

    Auth::login($user);
    Log::info('User logged in: ' . $user->email);

    return redirect('/home'); 
});

Route::get('/login/facebook', function () {
    return Socialite::driver('facebook')->redirect();
});

Route::get('/login/facebook/callback', function () {
    $facebookUser = Socialite::driver('facebook')->user(); 

    // Get user information from Facebook:
    $name = $facebookUser->getName();
    $email = $facebookUser->getEmail();
    $facebookId = $facebookUser->getId(); 

    // UpdateOrCreate logic (similar to Google):
    $user = User::updateOrCreate(
        ['facebook_id' => $facebookId],
        ['name' => $name, 'email' => $email] 
    );

    Auth::login($user); 
    return redirect('/home'); 
});
