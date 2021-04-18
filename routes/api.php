<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiNotes\ApiNotesController;
use App\Http\Controllers\ApiNotes\RegisterController;
use App\Http\Middleware\ChekPassword;


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

Route::middleware('auth:api')->get('/user', function(Request $request){
    return $request->user();



});
Route::resource('notes',ApiNotesController::class);





