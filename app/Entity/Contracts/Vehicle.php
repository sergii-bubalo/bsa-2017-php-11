<?php

namespace App\Entities\Contracts;

use App\Entities\Contracts\VehicleInterface;
use Illuminate\Contracts\Support\Arrayable;

/**
 * Class Vehicle
 * @package App\Entities\Contracts
 */
abstract class Vehicle implements VehicleInterface, Arrayable
{
    protected $id;
    protected $model;
    protected $price;

    public function __construct(array $data = null)
    {
        return $this->fromArray($data);
    }

    /**
     * Overload in your classes.
     *
     * @var array Field which can be filled with the fromArray function.
     */
    protected static $fillable = ['id', 'model', 'price'];

    /**
     * Fills the entity with data.
     *
     * @param array $data
     * @return \App\Entities\Contracts\VehicleInterface
     */
    public function fromArray(array $data) : VehicleInterface
    {
        if (empty(static::$fillable)) {
            return $this;
        }

        foreach (static::$fillable as $field) {
            if (array_has($data, $field)) {
                $this->$field = $data[$field];
            } else if (array_has($data, snake_case($field))) {
                $this->$field = $data[snake_case($field)];
            }
        }

        return $this;
    }

    /**
     * Formats the entity to array.
     *
     * @return array
     */
    abstract public function toArray() : array;

    /**
     * @return int
     */
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
}