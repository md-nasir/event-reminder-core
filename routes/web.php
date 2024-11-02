<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Event\EventController;

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->group(function () {
    Route::resource('events', EventController::class);
    Route::resource('events/reminder/create', [EventReminderController::class, '']);
});

