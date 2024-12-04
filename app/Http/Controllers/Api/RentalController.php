<?php

namespace App\Http\Controllers\Api;

use App\Enums\RentalStatus;
use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        return response()->json(Rental::all());

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|integer|exists:cars,id',
            'customer_id' => 'required|integer|exists:customers,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'rental_rate' => 'required|numeric',
            'insurance_charge' => 'required|numeric',
            'fuel_charge' => 'required|numeric',
            'total_charge' => 'required|numeric',
            'status' => RentalStatus::pending->value,
            'payment_status' => RentalStatus::unpaid->value,
        ]);

        $rental = Rental::create($request->all());
        return response()->json($rental, 201);
    }

    public function update(Request $request, Rental $rental)
    {
        $request->validate([
            'car_id' => 'required|integer|exists:cars,id',
            'customer_id' => 'required|integer|exists:customers,id',
            'start_date' => 'date',
            'end_date' => 'date|after:start_date',
            'rental_rate' => 'required|numeric',
            'insurance_charge' => 'required|numeric',
            'fuel_charge' => 'required|numeric',
            'total_charge' => 'required|numeric',
            'status' => RentalStatus::pending->value,
            'payment_status' => RentalStatus::unpaid->value,

        ]);

        $rental->update($request->all());
        return response()->json($rental,202);
    }

    public function destroy(Rental $rental)
    {
        $rental->delete();
        return response()->json(null, 204);
    }
}
