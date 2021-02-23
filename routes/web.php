<?php

use Illuminate\Support\Facades\Route;
use App\Models\Set;

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

Route::get("/register", ['as' => 'register.first', 'uses' => 'App\Http\Controllers\Register@Main']);
Route::post("/register", ['as' => 'register.second', 'uses' => 'App\Http\Controllers\Register@MakeAccount']);

Route::get("/", ['as' => 'dashboard.landing', 'uses' => 'App\Http\Controllers\Dashboard@Landing']);


Route::group(['middleware' => 'auth'], function () {
    Route::get("/dashboard", ['as' => 'dashboard.dashboard', 'uses' => 'App\Http\Controllers\Dashboard@Dashboard']);

    Route::post("/logout", ['as' => 'login.logout', 'uses' => 'App\Http\Controllers\Login@Logout']);

    Route::post("/sets/create", ['as' => 'sets.new-set', 'uses' => 'App\Http\Controllers\FlashcardSetController@post_new_set']);
    Route::post("/sets/delete", ['as' => 'sets.delete-from-index', 'uses' => 'App\Http\Controllers\FlashcardSetController@delete_from_index']);
    Route::get("/sets/datatable_index", ['as' => 'sets.datatable-index', 'uses' => 'App\Http\Controllers\FlashcardSetController@datatable_index']);
    Route::resource("/sets", 'App\Http\Controllers\FlashcardSetController');
    Route::resource("/users", 'App\Http\Controllers\UserController');
    Route::put("/users/{user}/update-password", ['as' => 'users.update-password', 'uses' => 'App\Http\Controllers\UserController@UpdatePassword']);

    Route::get("/flashcards/study/{set}/study-mode", ['as' => 'study.study-mode', 'uses' => 'App\Http\Controllers\StudyModeController@StudyMode']);
    Route::get("/flashcards/study/{set}/test-mode", ['as' => 'study.test-mode', 'uses' => 'App\Http\Controllers\StudyModeController@TestMode']);

    //Route::resource("/flashcards", 'App\Http\Controllers\FlashcardController');
});

Route::get('/pages/privacy-policy', function () {
    return view('contact aidancrane78@gmail.com and tell him this is missing.');
});

Route::get('/pages/application-terms-of-service', function () {
    return view('contact aidancrane78@gmail.com and tell him this is missing.');
});
