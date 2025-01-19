<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;

class BookingsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Booking::with(['vehicle', 'driver', 'approvedByLevel1', 'approvedByLevel2'])
            ->get()
            ->map(function ($booking) {
                return [
                    'ID' => $booking->id,
                    'Vehicle' => $booking->vehicle->name ?? 'N/A',
                    'Driver' => $booking->driver->name ?? 'N/A',
                    'Approved By Level 1' => $booking->approvedByLevel1->name ?? 'N/A',
                    'Approved By Level 2' => $booking->approvedByLevel2->name ?? 'N/A',
                    'Start Date' => $booking->start_date,
                    'End Date' => $booking->end_date,
                    'Purpose' => $booking->purpose,
                    'Start Odometer' => $booking->start_odometer,
                    'End Odometer' => $booking->end_odometer ?? 'N/A',
                    'Fuel Consumed' => $booking->fuel_consumed ?? 'N/A',
                    'Note' => $booking->note ?? 'N/A',
                    'Status' => $booking->status,
                ];
            });
    }
}
