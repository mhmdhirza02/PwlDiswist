<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::latest()->get();
        return view('admin.artikel.index', compact('artikel'));
    }

    public function create()
    {
        return view('admin.artikel.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'thumbnail' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('artikel', 'public');
        }

        Artikel::create($data);

        return redirect('/admin/artikel')->with('success','Artikel berhasil ditambahkan');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $data = $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('artikel', 'public');
        } else {
            unset($data['thumbnail']);
        }

        $artikel->update($data);

        return redirect('/admin/artikel')->with('success','Artikel berhasil diupdate');
    }

    public function destroy($id)
    {
        Artikel::destroy($id);
        return back()->with('success','Artikel berhasil dihapus');
    }
}
