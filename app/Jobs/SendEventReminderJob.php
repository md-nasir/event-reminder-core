<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventReminderMail;

class SendEventReminderJob implements ShouldQueue
{
    use Queueable;

    protected $recipients;
    protected $data;

    public function __construct($data, $recipients)
    {
        $this->data = $data;
        $this->recipients = $recipients;
    }

    public function handle()
    {
        Mail::to($this->recipients)->send(new EventReminderMail($this->data));
        // Will Add The Reminder History to DB
    }
}
