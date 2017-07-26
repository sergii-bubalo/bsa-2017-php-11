<?php
namespace App\Jobs\Traits;

use App\Entity\Car;
use App\Entity\User;
use App\Jobs\SendNotificationEmail;

trait CarCreateNotificationTrait
{
    public function carCreateNotification(Car $car, User $user = null): void
    {
        $job = (new SendNotificationEmail($user, $car))->onQueue('notification');
        dispatch($job);
    }
}