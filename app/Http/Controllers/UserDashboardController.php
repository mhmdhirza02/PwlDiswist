<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $bookings = \App\Models\Booking::where('user_id', auth()->id())
                    ->orderBy('created_at', 'desc')
                    ->get();
        return view('user.dashboard', compact('bookings'));
    }

    public function pay($id)
    {
        $booking = \App\Models\Booking::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $booking->update(['status' => 'confirmed']);
        
        return back()->with('success', 'Pembayaran berhasil dikonfirmasi! Tiket Anda sudah aktif.');
    }
}
