<?php

namespace App\Http\Controllers\Api\Admin;

use App\Entity\Car;
use App\Jobs\SendNotificationEmail;
use App\Jobs\Traits\CarCreateNotificationTrait;
use App\Manager\CarManager;
use App\Request\Contract\SaveCarRequest;
use App\Http\Controllers\Controller;


class CarController extends Controller
{
    use CarCreateNotificationTrait;

    private $carManager;

    public function __construct(CarManager $carManager)
    {
        $this->carManager = $carManager;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     * @internal param Car $car
     */
    public function index()
    {
        $this->authorize('hasApiAccess', Car::class);

        $cars = $this->carManager->findAll();

        $data = $cars->map(function ($car) {
            return collect($car)
                ->only(['id', 'model', 'year', 'color', 'price'])
                ->all();
        });

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SaveCarRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveCarRequest $request)
    {
        $this->authorize('hasApiAccess', Car::class);

        $car = $this->carManager->saveCar($request);

        $this->carCreateNotification($car);

        return response()->json($car);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $this->authorize('hasApiAccess', Car::class);

        $car = $this->carManager->findById($id);

        return $car ? response()->json($car) : response()->json(['error' => "There is no car with id $id"], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SaveCarRequest $request
     * @param  int $id
     * @return mixed
     */
    public function update(SaveCarRequest $request, int $id)
    {
        $this->authorize('hasApiAccess', Car::class);

        $car = $this->carManager->findById($id);

        return $car ? response()->json($this->carManager->saveCar($request)) : response()->json(['error' => "There is no car with id $id"], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return mixed
     */
    public function destroy(int $id)
    {
        $this->authorize('hasApiAccess', Car::class);

        $car = $this->carManager->findById($id);
        $this->carManager->deleteCar($id);
        $collection = $this->carManager->findAll();

        return $car ? $collection : response()->json(['error' => "There is no car with id $id"], 404);
    }
}
