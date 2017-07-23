<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'color',
        'model',
        'registration_number',
        'year',
        'mileage',
        'price',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getId() : int
    {
        return (int) $this->id;
    }

    /**
     * @param int $id
     * @return Vehicle
     */
    public function setId(int $id) : self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     * @return Car
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     * @return Car
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRegistrationNumber()
    {
        return $this->registration_number;
    }

    /**
     * @param mixed $license_number
     * @return Car
     */
    public function setRegistrationNumber($license_number)
    {
        $this->registration_number = $license_number;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     * @return Car
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @return Car
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function toArray() : array
    {
        return [
            'id' => $this->getId(),
            'model' => $this->getModel(),
            'year' => $this->getYear(),
            'registration_number' => $this->getRegistrationNumber(),
            'color' => $this->getColor(),
            'price' => $this->getPrice()
        ];
    }
}