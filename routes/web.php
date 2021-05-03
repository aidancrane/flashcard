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


Route::get("/login", ['as' => 'login.login', 'uses' => 'App\Http\Controllers\LoginController@Login']);
Route::post("/login", ['as' => 'login.check', 'uses' => 'App\Http\Controllers\LoginController@CheckLogin']);

Route::get("/register", ['as' => 'register.first', 'uses' => 'App\Http\Controllers\RegisterController@Register']);
Route::post("/register", ['as' => 'register.second', 'uses' => 'App\Http\Controllers\RegisterController@MakeAccount']);

Route::get("/", ['as' => 'dashboard.landing', 'uses' => 'App\Http\Controllers\DashboardController@Landing']);


Route::group(['middleware' => 'auth'], function () {
    Route::get("/dashboard", ['as' => 'dashboard.dashboard', 'uses' => 'App\Http\Controllers\DashboardController@Dashboard']);

    Route::post("/logout", ['as' => 'login.logout', 'uses' => 'App\Http\Controllers\LoginController@Logout']);

    Route::post("/sets/create", ['as' => 'sets.new-set', 'uses' => 'App\Http\Controllers\FlashcardSetController@post_new_set']);
    Route::post("/sets/delete", ['as' => 'sets.delete-from-index', 'uses' => 'App\Http\Controllers\FlashcardSetController@delete_from_index']);
    Route::get("/sets/datatable_index", ['as' => 'sets.datatable-index', 'uses' => 'App\Http\Controllers\FlashcardSetController@datatable_index']);
    Route::resource("/sets", 'App\Http\Controllers\FlashcardSetController');
    Route::resource("/users", 'App\Http\Controllers\UserController');
    Route::put("/users/{user}/update-password", ['as' => 'users.update-password', 'uses' => 'App\Http\Controllers\UserController@UpdatePassword']);

    Route::get("/flashcards/study/{set}/study-mode", ['as' => 'study.study-mode', 'uses' => 'App\Http\Controllers\StudyModeController@StudyMode']);
    Route::get("/flashcards/study/{set}/test-mode", ['as' => 'study.test-mode', 'uses' => 'App\Http\Controllers\StudyModeController@TestMode']);
    Route::post("/flashcards/study/{set}/test-mode-complete", ['as' => 'study.test-mode-complete', 'uses' => 'App\Http\Controllers\StudyModeController@TestModeComplete']);
    Route::post("/flashcards/study/{set}/results/{test_result}", ['as' => 'study.test-mode-complete', 'uses' => 'App\Http\Controllers\StudyModeController@TestResult']);

    Route::get("/flashcards/sets/{set}/results/{test_result}", ['as' => 'study.test-mode-view', 'uses' => 'App\Http\Controllers\StudyModeController@TestResult']);
    //return redirect("/flashcards/sets/" . $set->id . "/results/" . $testResult->id);
    //Route::resource("/flashcards", 'App\Http\Controllers\FlashcardController');

    Route::get("/statistics", ['as' => 'statistics.user', 'uses' => 'App\Http\Controllers\StatisticsController@MyStatistics']);
});

Route::get('/faq', function () {
    return view('faq.faq-index');
});

Route::get('/pages/privacy-policy', function () {
    return view('contact aidancrane78@gmail.com and tell him this is missing.');
});

Route::get('/pages/application-terms-of-service', function () {
    return view('contact aidancrane78@gmail.com and tell him this is missing.');
});

Route::get("/auth/google/redirect", ['as' => 'login.google-redirect', 'uses' => 'App\Http\Controllers\SocialiteControllers\GoogleOAuthController@GoogleRedirect']);
Route::get("/auth/google/callback", ['as' => 'login.google-callback', 'uses' => 'App\Http\Controllers\SocialiteControllers\GoogleOAuthController@GoogleCallback']);
