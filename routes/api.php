<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Set;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('hello', function () {
    return "hello to you aswell";
});

// Do not use this methodology to authenticate, use Laravel Passport/Laravel Sanctum.

// Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
//     Route::put('sets/{id}', function ($id) {
//         $set = Set::findOrFail($id);
//         $set->update($request->all());
//
//         return $set;
//     });
//
//     Route::get('sets/{id}', function ($id) {
//         return Set::find($id);
//     });
// });
