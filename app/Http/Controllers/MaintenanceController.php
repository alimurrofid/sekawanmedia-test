<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMaintenanceRequest;
use App\Http\Requests\UpdateMaintenanceRequest;
use App\Models\Maintenance;
use App\Models\Vehicle;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus maintenance!';
        $text = "Apakah anda yakin ingin menghapus maintenance ini?";
        confirmDelete($title, $text);
        return view('dashboard.maintenance.index', [
            'maintenances' => Maintenance::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicles = Vehicle::all();
        return view('dashboard.maintenance.create', compact('vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMaintenanceRequest $request)
    {
        try {
            Maintenance::create([
                'vehicle_id' => $request->vehicle_id,
                'date' => $request->date,
                'description' => $request->description,
            ]);

            return redirect()->route('maintenance.index')->with('success', 'Maintenance added successfully.');
        } catch (\Exception $e) {
            return back()->withErrors('An error occurred while adding the maintenance.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Maintenance $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maintenance $maintenance)
    {
        $vehicles = Vehicle::all();
        return view('dashboard.maintenance.edit', compact('maintenance', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMaintenanceRequest $request, Maintenance $maintenance)
    {
        try {
            $maintenance->update([
                'vehicle_id' => $request->vehicle_id,
                'date' => $request->date,
                'description' => $request->description,
            ]);

            return redirect()->route('maintenance.index')->with('success', 'Maintenance updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors('An error occurred while updating the maintenance.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maintenance $maintenance)
    {
        try {
            $maintenance->delete();
            return redirect()->route('maintenance.index')->with('success', 'Maintenance deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors('An error occurred while deleting the maintenance.');
        }
    }
}
