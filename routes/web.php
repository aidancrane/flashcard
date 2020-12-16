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


Route::get("/login", ['as' => 'login.login', 'uses' => 'App\Http\Controllers\Login@Login']);
Route::post("/login", ['as' => 'login.check', 'uses' => 'App\Http\Controllers\Login@CheckLogin']);
Route::post("/logout", ['as' => 'login.logout', 'uses' => 'App\Http\Controllers\Login@Logout']);

Route::get("/register", ['as' => 'register.first', 'uses' => 'App\Http\Controllers\Register@Main']);
Route::post("/register", ['as' => 'register.second', 'uses' => 'App\Http\Controllers\Register@MakeAccount']);

Route::get("/", ['as' => 'dashboard.landing', 'uses' => 'App\Http\Controllers\Dashboard@Landing']);

Route::get("/dashboard", ['as' => 'dashboard.dashboard', 'uses' => 'App\Http\Controllers\Dashboard@Dashboard'])->middleware('auth');

Route::resource("/sets", 'App\Http\Controllers\FlashcardSetController')->middleware('auth');
Route::post("/sets/create", ['as' => 'sets.new-set', 'uses' => 'App\Http\Controllers\FlashcardSetController@post_new_set']);

Route::resource("/flashcards", 'App\Http\Controllers\FlashcardController')->middleware('auth');


Route::get('/pages/privacy-policy', function () {
    return view('contact aidancrane78@gmail.com and tell him this is missing.');
});

Route::get('/pages/application-terms-of-service', function () {
    return view('contact aidancrane78@gmail.com and tell him this is missing.');
});
