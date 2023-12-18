<?php

use App\Http\Controllers\Api\Auth\RegistrationController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Event\EventController;
use App\Http\Controllers\Api\Event\ParticipateEventController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//registration user
Route::post('registration', RegistrationController::class);

//Login user
Route::post('login', LoginController::class);

Route::group(['middleware' => 'auth:sanctum'], function(){
    //Event rest
    Route::apiResource('events', EventController::class);
    //participate 
    Route::post('participate', [ParticipateEventController::class, 'addParticipate']);
    Route::post('cancel_participate', [ParticipateEventController::class, 'cancelParticipate']);
});

