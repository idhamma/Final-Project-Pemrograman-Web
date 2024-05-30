<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motorcycle;
use App\Models\Transaction;

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

    public function show($id)
    {
        $motorcycle = Motorcycle::where('id', $id)->get();
        return response()->json($motorcycle);
    }

    public function rent(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_user' => 'required|integer',
            'id_motorcycle' => 'required|integer',
            'status' => 'required|string',
            'rental_date' => 'required|date',
            'return_date' => 'required|date',
            'location' => 'required|string',
            'duration' => 'required|integer',
            'total_fee' => 'required|numeric',
        ]);

        // Cari motor yang akan disewa
        $motorcycle = Motorcycle::find($request->id_motorcycle);
        if ($motorcycle) {
            // Buat transaksi baru
            $transaction = new Transaction();
            $transaction->id_user = $request->id_user; // Asumsi user telah login
            $transaction->id_motorcycle = $request->id_motorcycle;
            $transaction->status = $request->status;
            $transaction->rental_date = $request->rental_date;
            $transaction->return_date = $request->return_date;
            $transaction->location = $request->location;
            $transaction->duration = $request->duration;
            $transaction->price = $request->total_fee;

            $transaction->save();

            // Update status motor
            $motorcycle->status = false;
            $motorcycle->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }
}


