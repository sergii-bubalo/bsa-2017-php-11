<?php

namespace App\Policies;

use App\Entity\User;
use App\Entity\Car;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class CarPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the car.
     *
     * @param  \App\Entity\User $user
     * @param Car $car
     * @return mixed
     */
    public function view(User $user, Car $car)
    {
        return $user->id === $car->user->id;
    }

    /**
     * Determine whether the user can create cars.
     *
     * @param  \App\Entity\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Auth::user()->is_admin;
    }

    /**
     * Determine whether the user can update the car.
     *
     * @param  \App\Entity\User  $user
     * @param  \App\Entity\Car  $car
     * @return mixed
     */
    public function update(User $user, Car $car)
    {
        return $user->id === $car->user->id | Auth::user()->is_admin;
    }

    /**
     * Determine whether the user can delete the car.
     *
     * @param  \App\Entity\User  $user
     * @param  \App\Entity\Car  $car
     * @return mixed
     */
    public function delete(User $user, Car $car)
    {
        return $user->id === $car->user->id | Auth::user()->is_admin;
    }

    public function hasApiAccess(User $user)
    {
        return $user->is_admin;
    }
}
