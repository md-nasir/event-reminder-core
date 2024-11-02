<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\EventController;

Route::prefix('/v1')->group(function () {
    Route::get('events/upcomming', [EventController::class, 'upcomingEvents']);
    Route::get('events/completed', [EventController::class, 'completedEvents']);
});

