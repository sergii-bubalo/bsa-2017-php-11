<?php

namespace App\Entities\Contracts;

/**
 * Interface VehicleInterface
 * @package App\Entities\Contracts
 */
interface VehicleInterface
{
    /**
     * Fills the instance by array data.
     *
     * @param array $data
     * @return VehicleInterface
     */
    public function fromArray(array $data) : VehicleInterface;

    /**
     * Returns an array with instance fields.
     *
     * @return array
     */
    public function toArray() : array;
}