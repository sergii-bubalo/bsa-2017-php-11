<?php

namespace App\Mail;

use App\Entity\Car;
use App\Entity\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CarCreated extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    private $car;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param Car $car
     */
    public function __construct(User $user, Car $car)
    {
        $this->user = $user;
        $this->car = $car;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('cars.emails.created')
            ->with([
                'user' => $this->user,
                'car' => $this->car,
            ]);
    }
}
