<?php

namespace App\Jobs;

use App\Entity\Car;
use App\Entity\User;
use App\Mail\CarCreated;
use App\Manager\UserManager;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendNotificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;

    private $car;

    /**
     * Create a new job instance.
     *
     * @param User $user
     * @param Car $car
     */
    public function __construct(User $user = null, Car $car = null)
    {
        $this->user = $user;
        $this->car = $car;
    }

    /**
     * Execute the job.
     *
     * @param UserManager $userManager
     * @return void
     */
    public function handle(UserManager $userManager)
    {
        $users = $userManager->findAll();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new CarCreated($user, $this->car));
        }
    }

    /**
     * @param $property
     * @return Car|User|null
     */
    public function __get($property)
    {
        if ($property == 'user') {
            return $this->user;
        } elseif ($property =='car') {
            return $this->car;
        }
        
        return null;
    }
}
