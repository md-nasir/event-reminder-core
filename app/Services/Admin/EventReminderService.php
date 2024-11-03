<?php

namespace App\Services\Admin;

use App\Repositories\Contracts\Admin\EventRepositoryInterface;
use App\Services\Contracts\Admin\EventReminderServiceInterface;
use App\Jobs\SendEventReminderJob;
use App\Exceptions\Services\EventReminderServiceException;

/**
 * Class EventService
 * @package App\Services\Admin
 */
class EventReminderService implements EventReminderServiceInterface
{
    protected $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function send(array $reminder)
    {
        $data['recipients'] = explode(",", trim($data['recipients']));
        SendEventReminderJob::dispatch($data);
    }

    public function bulkSendFromCsv($filePath)
    {
        if (($handle = fopen($filePath, 'r')) !== false) {
            $header = fgetcsv($handle);
            if ($header[0] != 'Title' || $header[1] != 'Content' || $header[2] != 'Email') {
                throw new EventReminderServiceException("'CSV format is incorrect.");
            }
            while (($data = fgetcsv($handle)) !== false) {
                SendEventReminderJob::dispatch([
                    'title' => $data[0],
                    'content' => $data[1]
                ], $data[2]);
            }
            fclose($handle);
        }
    }

}
