<?php

namespace App\Http\Controllers;

use App\Exports\BookingsExport;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\Driver;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class BookingController extends Controller
{

    public function export()
    {
        return Excel::download(new BookingsExport, 'bookings.xlsx');
    }
    public function showChart()
    {
        // Ambil data kendaraan dan jumlah pemesanan berdasarkan vehicle_id
        $bookingData = Booking::select('vehicle_id', DB::raw('count(*) as booking_count'))
            ->groupBy('vehicle_id')
            ->get();

        // Ambil nama kendaraan berdasarkan ID kendaraan di booking
        $vehicleNames = Vehicle::whereIn('id', $bookingData->pluck('vehicle_id'))
            ->orderBy('id')
            ->pluck('vehicle_name');

        // Ambil jumlah pemesanan
        $bookingCounts = $bookingData->pluck('booking_count');

        // Kirim data ke view
        return view('dashboard.home', compact('vehicleNames', 'bookingCounts'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus booking!';
        $text = "Apakah anda yakin ingin menghapus booking ini?";
        confirmDelete($title, $text);
        return view('dashboard.booking.index', [
            'bookings' => Booking::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.booking.create', [
            'drivers' => Driver::all(),
            'vehicles' => Vehicle::all(),
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        try {
            DB::beginTransaction();

            $booking = Booking::create([
                'vehicle_id' => $request->vehicle_id,
                'driver_id' => $request->driver_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'purpose' => $request->purpose,
                'start_odometer' => $request->start_odometer,
                'approved_by_level_1' => $request->approved_by_level_1,
                'approved_by_level_2' => $request->approved_by_level_2,
                'status' => 'pending',
            ]);

            if (!empty($booking->approved_by_level_1)) {
                $approver1 = User::find($booking->approved_by_level_1);
                if ($approver1 && !$approver1->hasRole('approver1')) {
                    $approver1->assignRole('approver1');
                }
            }

            if (!empty($booking->approved_by_level_2)) {
                $approver2 = User::find($booking->approved_by_level_2);
                if ($approver2 && !$approver2->hasRole('approver2')) {
                    $approver2->assignRole('approver2');
                }
            }

            DB::commit();

            return redirect()->route('booking.index')
                ->with('success', 'Booking created successfully, and approvers were assigned roles.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('booking.index')
                ->with('error', 'Failed to create booking, please try again. Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $vehicles = Vehicle::all();
        $drivers = Driver::all();
        $users = User::all();
        return view('dashboard.booking.edit', compact('booking', 'vehicles', 'drivers', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        try {
            // Update booking data
            $booking->update([
                'vehicle_id' => $request->vehicle_id,
                'driver_id' => $request->driver_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'purpose' => $request->purpose,
                'start_odometer' => $request->start_odometer,
                'end_odometer' => $request->end_odometer,
                'fuel_consumed' => $request->fuel_consumed,
                'note' => $request->note,
                'approved_by_level_1' => $request->approved_by_level_1,
                'approved_by_level_2' => $request->approved_by_level_2,
            ]);

            // Update status to 'complete' if approved_by_level_2 exists
            if ($booking->approved_by_level_2) {
                $booking->update(['status' => 'completed']);
            }

            return redirect()->route('booking.index')->with('success', 'Booking updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors('An error occurred while updating the Booking: ' . $e->getMessage())->withInput();
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        try {
            $booking->delete();
            return redirect()->route('booking.index')->with('success', 'booking deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors('An error occurred while deleting the booking.');
        }
    }
}
