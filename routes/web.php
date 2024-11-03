<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Event\EventController;
use App\Http\Controllers\Admin\Event\EventReminderController;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('events', EventController::class);
    Route::get('events/{id}/reminder/create', [EventReminderController::class, 'create'])->name('events.reminder.create');
    Route::post('events/{id}/reminder/send', [EventReminderController::class, 'send'])->name('events.reminder.send');
    Route::get('events/reminder/bulk/create', [EventReminderController::class, 'bulkCreate'])->name('events.reminder.bulk-create');
    Route::post('events/reminder/bulk/send', [EventReminderController::class, 'bulkSend'])->name('events.reminder.bulk-send');;
});

Route::get('/dashboard', function () {
    return redirect()->route('events.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


