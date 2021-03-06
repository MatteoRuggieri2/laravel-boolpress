<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Posts API Endpoints
Route::get('/posts', 'Api\PostController@index');
Route::get('/posts/{slug}', 'Api\PostController@show');

// Tags API Endpoints
Route::get('/tags', 'Api\TagController@index');
Route::get('/tags/{slug}', 'Api\TagController@show');

// Lead API Endpoints
Route::post('/leads/store', 'Api\LeadController@store');