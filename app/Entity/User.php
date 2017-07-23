<?php

namespace App\Entity;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableInterface;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements AuthenticatableInterface
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'is_active',
        'email',
        'password',
        'is_admin',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
        'is_admin' => 'boolean'
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
