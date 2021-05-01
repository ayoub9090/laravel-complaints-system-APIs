<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JwtAuthController;
use App\Http\Controllers\ComplaintController;

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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/signup', [JwtAuthController::class, 'register']);
    Route::post('/signin', [JwtAuthController::class, 'login']);
    Route::get('/user', [JwtAuthController::class, 'user']);
    Route::post('/token-refresh', [JwtAuthController::class, 'refresh']);
    Route::post('/signout', [JwtAuthController::class, 'signout']);

});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'complaint'
], function ($router) {
    Route::post('/register', [ComplaintController::class, 'register']);
    Route::get('/listing', [ComplaintController::class, 'listing']);
    Route::get('/getComplaint/{id}', [ComplaintController::class, 'getComplaint']);
    Route::post('/update/{id}', [ComplaintController::class, 'update']);

});

