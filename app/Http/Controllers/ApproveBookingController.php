<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class ApproveBookingController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('approver1')) {
            $bookings = Booking::whereIn('status', ['pending', 'approved_level_1', 'rejected_level_1'])->get();
        } elseif ($user->hasRole('approver2')) {
            $bookings = Booking::whereIn('status', ['approved_level_1', 'approved_level_2', 'rejected_level_2'])->get();
        }

        return view('dashboard.booking.approve', [
            'bookings' => $bookings,
        ]);
    }

    public function approve($id)
    {
        $booking = Booking::findOrFail($id);
        $user = auth()->user();

        if ($user->hasRole('approver1')) {
            $booking->status = 'approved_level_1';
        } elseif ($user->hasRole('approver2')) {
            $booking->status = 'approved_level_2';
        }

        $booking->save();

        return redirect()->back();
    }

    public function reject($id)
    {
        $booking = Booking::findOrFail($id);
        $user = auth()->user();

        if ($user->hasRole('approver1')) {
            $booking->status = 'rejected_level_1';
        } elseif ($user->hasRole('approver2')) {
            $booking->status = 'rejected_level_2';
        }

        $booking->save();

        return redirect()->back();
    }
}
