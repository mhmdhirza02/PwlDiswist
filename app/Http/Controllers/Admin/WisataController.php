<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\WisataGaleri;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
{
    public function index()
    {
        $wisata = Wisata::latest()->get();
        return view('admin.wisata.index', compact('wisata'));
    }

    public function create()
    {
        return view('admin.wisata.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'foto' => 'required|image|max:3072',
            'galeri.*' => 'nullable|image|max:3072',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('wisata', 'public');
        }

        if (isset($data['galeri'])) {
            unset($data['galeri']);
        }

        $wisata = Wisata::create($data);

        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $file) {
                $path = $file->store('wisata/galeri', 'public');
                $wisata->galeri()->create(['foto' => $path]);
            }
        }

        return redirect('/admin/wisata')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $wisata = Wisata::findOrFail($id);
        return view('admin.wisata.edit', compact('wisata'));
    }

    public function update(Request $request, $id)
    {
        $wisata = Wisata::findOrFail($id);

        $data = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'foto' => 'nullable|image|max:3072',
            'galeri.*' => 'nullable|image|max:3072',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('wisata', 'public');
        } else {
            unset($data['foto']);
        }

        $wisata->update($data);

        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $file) {
                $path = $file->store('wisata/galeri', 'public');
                $wisata->galeri()->create(['foto' => $path]);
            }
        }

        return redirect('/admin/wisata')->with('success', 'Data berhasil diupdate');
    }

    public function destroyGaleri($id)
    {
        $galeri = WisataGaleri::findOrFail($id);
        Storage::disk('public')->delete($galeri->foto);
        $galeri->delete();
        return back()->with('success', 'Foto galeri berhasil dihapus');
    }

    public function destroy($id)
    {
        Wisata::destroy($id);
        return back()->with('success', 'Data berhasil dihapus');
    }
}

