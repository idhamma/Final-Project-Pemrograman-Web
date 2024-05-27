<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    public function getByLocation(Request $request)
    {
        $location = $request->input('location');
        $motorcycles = Motorcycle::where('location', $location)
            ->where('status', true)
            ->pluck('name', 'id');
        return response()->json($motorcycles);
    }
}
