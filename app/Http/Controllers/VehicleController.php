<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus kendaraan!';
        $text = "Apakah anda yakin ingin menghapus kendaraan ini?";
        confirmDelete($title, $text);
        return view('dashboard.vehicle.index', [
            'vehicles' => Vehicle::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleRequest $request)
    {
        try {
            Vehicle::create([
                'name' => $request->name,
                'type' => $request->type,
                'ownership' => $request->ownership,
                'status' => 'available',
            ]);

            return redirect()->route('vehicle.index')->with('success', 'Vehicle added successfully.');
        } catch (\Exception $e) {
            return back()->withErrors('An error occurred while adding the vehicle.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        return view('dashboard.vehicle.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        try {
            $vehicle->update([
                'name' => $request->name,
                'type' => $request->type,
                'ownership' => $request->ownership,
            ]);

            return redirect()->route('vehicle.index')->with('success', 'Vehicle updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors('An error occurred while updating the vehicle.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        try {
            $vehicle->delete();
            return redirect()->route('vehicle.index')->with('success', 'Vehicle deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors('An error occurred while deleting the vehicle.');
        }
    }
}
