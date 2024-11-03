<?php

namespace App\Services\Contracts\Admin;

interface EventReminderServiceInterface
{
    public function send(array $reminder);

    public function bulkSendFromCsv($filePath);
}
