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
    return view('landing');
});

Route::get("/login", ['as' => 'login.login', 'uses' => 'App\Http\Controllers\Login@Login']);
Route::post("/login", ['as' => 'login.check', 'uses' => 'App\Http\Controllers\Login@Login']);
