<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DasboardController;
use App\Http\Controllers\Web\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DasboardController::class, 'index'])->name('dashboard');
    //Events
    Route::get('/event/{id}', [EventController::class, 'show'])->name('event.show');
    Route::get('/event_participate/{id}', [EventController::class, 'addParticipate'])->name('event.addParticipate');
    Route::get('/event_cancel_participate/{id}', [EventController::class, 'cancelParticipate'])->name('event.cancelParticipate');

    Route::get('/ajax_event', [EventController::class, 'ajaxEvent'])->name('event.ajax');
});



require __DIR__.'/auth.php';
