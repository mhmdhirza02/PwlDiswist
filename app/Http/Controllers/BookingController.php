<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Request $request)
    {
        $package = $request->query('package');
        $price = $request->query('price');
        return view('pages.booking', compact('package', 'price'));
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'date' => 'required|date',
            'package_name' => 'required',
            'total_price' => 'required',
            'payment' => 'required',
        ]);

        // Save to Database
        Booking::create([
            'user_id' => auth()->id(), // Save User ID if logged in
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'travel_date' => $request->date,
            'package_name' => $request->package_name,
            'total_price' => $request->total_price,
            'payment_method' => $request->payment,
            'status' => 'pending'
        ]);

        return redirect()->route('booking.success')->with('success', 'Booking berhasil! Tim kami akan menghubungi Anda segera.');
    }

    public function success()
    {
        return view('pages.booking_success');
    }
}
