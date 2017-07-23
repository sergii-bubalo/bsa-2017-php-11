<?php

namespace App\Http\Controllers;

use App\Entity\Car;
use App\Entity\User;
use App\Manager\CarManager;
use App\Request\Contract\SaveCarRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class CarController extends Controller
{
    private $carManager;

    /**
     * CarController constructor.
     * @param CarManager $carManager
     */
    public function __construct(CarManager $carManager)
    {
        $this->middleware('isAdmin')->only('edit', 'destroy');
        $this->carManager = $carManager;
    }

    /**
     * Display a listing of the resource.
     * @return Response|View
     */
    public function index(): View
    {
        $cars = $this->carManager->findAll();

        return view('cars.list', [
            'cars' => $cars,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response|View
     */
    public function create()/*: View*/
    {
        if (Gate::denies('create', Car::class)) {
            return redirect('/');
        }

        return view('cars.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SaveCarRequest $request
     * @return View
     */
    public function store(SaveCarRequest $request): View
    {
//        $this->validate($request, [
//            'model' => 'required|max:255|regex:~[a-zA-Z_ ]~',
//            'year' => 'required|integer|between:1000,' . date('Y'),
//            'registration_number' => 'required|alpha_num|size:6',
//            'color' => 'required|max:255|alpha',
//            'price' => 'required|numeric',
//        ]);

        $this->carManager->saveCar($request);

        return view('cars.list', [
            'cars' => $this->carManager->findAll(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response|View
     */
    public function show(int $id): View
    {
        $car = $this->carManager->findById($id);

        return view('cars.item', [
            'car' => $car,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response|View
     */
    public function edit(int $id)
    {
        $car = $this->carManager->findById($id);

        return view('cars.edit', [
            'car' => $car,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return Response|View
     */
    public function update(SaveCarRequest $request, int $id): View
    {
        $this->validate($request, [
            'model' => 'required|max:255|regex:~[a-zA-Z_ ]~',
            'year' => 'required|integer|between:1000,' . date('Y'),
            'registration_number' => 'required|alpha_num|size:6',
            'color' => 'required|max:255|alpha',
            'price' => 'required|numeric',
        ]);

        $car = $this->carManager->findById($id);

        $this->carManager->saveCar($request);

        return view('cars.item', [
            'car' => $car,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
//        if (Gate::denies('delete', User::class, Car::class)) {
//            return redirect('/');
//        }

        $this->carManager->deleteCar($id);

        return redirect()->route('cars.index');
    }
}
