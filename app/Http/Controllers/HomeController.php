<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Hotel;
use App\Models\Kuliner;
use App\Models\Package;
use App\Models\Artikel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch 3 for slider/popular and 3 for hits
        $wisataPopuler = Wisata::take(3)->get();
        $wisataHits = Wisata::skip(3)->take(3)->get();
        $artikels = Artikel::latest()->take(3)->get();
        return view('home', compact('wisataPopuler', 'wisataHits', 'artikels'));
    }

    public function detail($id)
    {
        $wisata = Wisata::with(['reviews.user'])->findOrFail($id);
        return view('pages.wisata_detail', compact('wisata'));
    }

    public function kulinerDetail($id)
    {
        $kuliner = Kuliner::findOrFail($id);
        return view('pages.kuliner_detail', compact('kuliner'));
    }

    public function wisata(Request $request)
    {
        $query = Wisata::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('deskripsi', 'like', "%{$search}%")
                ->orWhere('lokasi', 'like', "%{$search}%");
        }

        $wisata = $query->get();
        return view('pages.wisata', compact('wisata'));
    }

    public function hotel(Request $request)
    {
        $query = Hotel::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('location', 'like', "%{$search}%");
        }

        $hotels = $query->get();
        return view('pages.hotel', compact('hotels'));
    }

    public function hotelDetail($id)
    {
        $hotel = Hotel::with('galeri')->findOrFail($id);
        return view('pages.hotel_detail', compact('hotel'));
    }

    public function kuliner(Request $request)
    {
        $query = Kuliner::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('category', 'like', "%{$search}%");
        }

        // Fetch all data including ID for linking
        $kuliner = $query->get();
        return view('pages.kuliner', compact('kuliner'));
    }

    public function paket(Request $request)
    {
        $query = Package::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('duration', 'like', "%{$search}%");
        }

        $packages = $query->get(); // Use get() directly as we probably don't need aliasing for new views if we update them or use attributes directly
        return view('pages.paket', compact('packages'));
    }

    public function artikel(Request $request)
    {
        $query = Artikel::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('judul', 'like', "%{$search}%")
                ->orWhere('konten', 'like', "%{$search}%");
        }

        $artikels = $query->latest()->get();
        return view('pages.artikel', compact('artikels'));
    }

    public function artikelDetail($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('pages.artikel_detail', compact('artikel'));
    }
}
