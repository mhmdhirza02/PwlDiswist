<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kuliner;
use Illuminate\Support\Facades\Storage;

class KulinerController extends Controller
{
    public function index()
    {
        $kuliners = Kuliner::latest()->get();
        return view('admin.kuliner.index', compact('kuliners'));
    }

    public function create()
    {
        return view('admin.kuliner.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'description' => 'required',
            'category' => 'required',
            'price_range' => 'required',
            'image' => 'required|image|max:3072',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('kuliner', 'public');
        }

        Kuliner::create($data);

        return redirect('/admin/kuliner')->with('success', 'Data Kuliner berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kuliner = Kuliner::findOrFail($id);
        return view('admin.kuliner.edit', compact('kuliner'));
    }

    public function update(Request $request, $id)
    {
        $kuliner = Kuliner::findOrFail($id);
        
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'description' => 'required',
            'category' => 'required',
            'price_range' => 'required',
            'image' => 'nullable|image|max:3072',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($kuliner->image) {
                Storage::disk('public')->delete($kuliner->image);
            }
            $data['image'] = $request->file('image')->store('kuliner', 'public');
        } else {
            unset($data['image']);
        }

        $kuliner->update($data);

        return redirect('/admin/kuliner')->with('success', 'Data Kuliner berhasil diupdate');
    }

    public function destroy($id)
    {
        $kuliner = Kuliner::findOrFail($id);
        if ($kuliner->image) {
            Storage::disk('public')->delete($kuliner->image);
        }
        $kuliner->delete();
        return back()->with('success', 'Data Kuliner berhasil dihapus');
    }
}
