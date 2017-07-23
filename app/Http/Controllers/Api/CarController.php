<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Manager\CarManager;

class CarController extends Controller
{
    private $carManager;

    public function __construct(CarManager $carManager)
    {
        $this->carManager = $carManager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = $this->carManager->findAll();

        $data = $cars->map(function ($car) {
            return collect($car)
                ->only(['id', 'model', 'year', 'color', 'price'])
                ->all();
        });

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $car = $this->carManager->findById($id);

        return $car ? response()->json($car) : response()->json(['error' => "There is no car with id $id"], 404);
    }
}
