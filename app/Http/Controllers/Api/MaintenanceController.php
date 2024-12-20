<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{

    public function index()
    {
        return response()->json(Maintenance::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|integer|exists:cars,id',
            'type' => 'required|integer|max:10',
            'description' => 'required|string|max:255',
            'cost' => 'required|integer|min:10',
            'maintenance_date' => 'date',
        ]);

        $maintenance = Maintenance::create($request->all());
        return response()->json($maintenance, 201);
    }
    public function update(Request $request, Maintenance $maintenance)
    {
        $request->validate([
            'car_id' => 'required|integer|exists:cars,id',
            'type' => 'required|integer|max:10',
            'description' => 'required|string|max:255',
            'cost' => 'required|integer|max:10',
            'maintenance_date' => 'date',
        ]);

        $maintenance->update($request->all());
        return response()->json($maintenance, 202);
    }

    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();
        return response()->json(null, 204);
    }
}
