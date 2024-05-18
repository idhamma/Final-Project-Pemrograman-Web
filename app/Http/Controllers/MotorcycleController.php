<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motorcycle = Motorcycle::all();
        return view('motorcycle', compact('motorcycle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('motorcycle.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'plat_number' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'cc' => 'required|integer',
            'year' => 'required|integer',
            'location' => 'required|string|max:255',
            'fee' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        Motorcycle::create($request->all());

        return redirect()->route('motorcycle.index')->with('success', 'Motorcycle updated successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('motorcycle.show', compact('motorcycle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('motorcycle.edit', compact('motorcycle'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'plat_number' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'cc' => 'required|integer',
            'year' => 'required|integer',
            'location' => 'required|string|max:255',
            'fee' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        Motorcycle::find($id)->update($request->all());

        return redirect()->route('motorcycle.index')
                        ->with('success', 'Motorcycle updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $motorcycle->delete();

        return redirect()->route('motorcycle.index')
                        ->with('success', 'Motorcycle deleted successfully.');
    }

}
