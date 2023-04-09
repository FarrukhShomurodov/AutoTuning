<?php

namespace App\Services;

use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CarService
{
    /**
     * @return LengthAwarePaginator
     */
    public function show(): LengthAwarePaginator
    {
        return Car::query()->paginate(30);
    }

    /**
     * @param array $validated
     * @return Builder|Model
     */
    public function store(array $validated): Model|Builder
    {
        return Car::query()->create($validated);
    }

    /**
     * @param Car $car
     * @param array $validate
     * @return bool
     */
    public function update(Car $car, array $validate): bool
    {
        return $car->update($validate);
    }

    /**
     * @param Car $car
     * @return bool|null
     */
    public function destroy(Car $car): ?bool
    {
        return $car->delete();
    }
}
