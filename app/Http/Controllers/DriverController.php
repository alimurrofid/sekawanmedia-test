<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use App\Models\Driver;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus driver!';
        $text = "Apakah anda yakin ingin menghapus driver ini?";
        confirmDelete($title, $text);
        return view('dashboard.driver.index', [
            'drivers' => Driver::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.driver.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDriverRequest $request)
    {
        try {
            Driver::create([
                'name' => $request->name,
                'contact' => $request->contact,
            ]);

            return redirect()->route('driver.index')->with('success', 'Driver added successfully.');
        } catch (\Exception $e) {
            return back()->withErrors('An error occurred while adding the driver.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        return view('dashboard.driver.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDriverRequest $request, Driver $driver)
    {
        try {
            $driver->update([
                'name' => $request->name,
                'contact' => $request->contact,
            ]);

            return redirect()->route('driver.index')->with('success', 'Driver updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors('An error occurred while updating the driver.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        try {
            $driver->delete();
            return redirect()->route('driver.index')->with('success', 'Driver deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors('An error occurred while deleting the driver.');
        }
    }
}
