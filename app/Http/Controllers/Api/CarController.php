<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Services\CarService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;


class CarController extends Controller
{
    private CarService $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function show(): AnonymousResourceCollection
    {
        $car = $this->carService->show();
        return CarResource::collection($car);
    }

    /**
     * @param CarRequest $request
     * @return CarResource
     */
    public function store(CarRequest $request): CarResource
    {
        $car = $this->carService->store($request->validated());
        return CarResource::make($car);
    }

    /**
     * @param Car $car
     * @param CarRequest $request
     * @return CarResource
     */
    public function update(Car $car, CarRequest $request): CarResource
    {
        $car = $this->carService->update($car ,$request->validated());
        return CarResource::make($request);
    }

    /**
     * @param Car $car
     * @return Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
     */
    public function destroy(Car $car): Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        $this->carService->destroy($car);
        return response("car success deleted");
    }
}
