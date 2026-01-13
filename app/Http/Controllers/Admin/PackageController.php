<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->get();
        return view('admin.paket.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.paket.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'image' => 'required|image|max:3072',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('paket', 'public');
        }

        Package::create($data);

        return redirect('/admin/paket')->with('success', 'Data Paket Wisata berhasil ditambahkan');
    }

    public function edit($id)
    {
        $paket = Package::findOrFail($id);
        return view('admin.paket.edit', compact('paket'));
    }

    public function update(Request $request, $id)
    {
        $paket = Package::findOrFail($id);
        
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'image' => 'nullable|image|max:3072',
        ]);

        if ($request->hasFile('image')) {
            if ($paket->image) {
                Storage::disk('public')->delete($paket->image);
            }
            $data['image'] = $request->file('image')->store('paket', 'public');
        } else {
            unset($data['image']);
        }

        $paket->update($data);

        return redirect('/admin/paket')->with('success', 'Data Paket Wisata berhasil diupdate');
    }

    public function destroy($id)
    {
        $paket = Package::findOrFail($id);
        if ($paket->image) {
            Storage::disk('public')->delete($paket->image);
        }
        $paket->delete();
        return back()->with('success', 'Data Paket Wisata berhasil dihapus');
    }
}
