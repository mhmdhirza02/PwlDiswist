<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'wisata_id' => 'required|exists:wisata,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:500',
        ]);

        \App\Models\Review::create([
            'user_id' => auth()->id(),
            'wisata_id' => $request->wisata_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Ulasan Anda telah berhasil dikirim!');
    }
}
