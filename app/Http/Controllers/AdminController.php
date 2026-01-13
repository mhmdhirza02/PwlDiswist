<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Artikel;
use App\Models\User;

use App\Models\Booking;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard',[
            'wisata' => Wisata::count(),
            'artikel' => Artikel::count(),
            'bookings_count' => Booking::count(),
            'recent_bookings' => Booking::latest()->take(5)->get(),
            'admin' => User::where('role','admin')->count(),
            'users_count' => User::where('role','user')->count()
        ]);
    }
}