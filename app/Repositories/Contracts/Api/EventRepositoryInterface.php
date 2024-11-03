<?php

namespace App\Repositories\Contracts\Api;

/**
 * Interface EventRepositoryInterface
 * @package App\Repositories\Contracts\Api
 */
interface EventRepositoryInterface
{
    public function upComingEvents();

    public function completedEvents();
}
