<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        return response()->json(Car::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:10',
            'daily_rate' =>'required|numeric|max:10',
            'fuel_type' => 'required|numeric|max:10',
            'is_available' => 'boolean',
        ]);

        $car = Car::create($request->all());
        return response()->json($car, 201);
    }

    public function update(Request $request, Car $car)

    {
        $request->validate([
            'make' => 'string|max:255',
            'model' => 'string|max:255',
            'year' => 'integer',
            'daily_rate' => 'numeric',
            'fuel_type' => 'string|max:255',
            'is_available' => 'boolean',
        ]);

        $car->update($request->all());
        return response()->json($car, 202);
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return response()->json(null, 204);
    }

}
