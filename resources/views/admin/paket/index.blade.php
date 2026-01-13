@extends('admin.layouts.app')

@section('header', 'Kelola Paket Wisata')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Daftar Paket Wisata</h1>
            <p class="text-sm text-slate-500">Manajemen konten paket liburan menarik di Yogyakarta.</p>
        </div>
        <a href="/admin/paket/create"
           class="bg-primary hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-bold transition-all text-sm flex items-center gap-2 shadow-sm">
            <i class="bi bi-plus-lg"></i>
            Tambah Data
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-slate-50 border-b border-slate-200 text-slate-600 uppercase text-[11px] font-bold tracking-wider">
                    <tr>
                        <th class="px-6 py-4">No.</th>
                        <th class="px-4 py-4">Preview</th>
                        <th class="px-4 py-4">Nama Paket</th>
                        <th class="px-4 py-4">Durasi</th>
                        <th class="px-4 py-4">Harga</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($packages as $index => $p)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4 text-slate-400 font-medium">{{ $index + 1 }}</td>
                        <td class="px-4 py-4">
                            @if($p->image)
                                <img src="{{ asset('storage/'.$p->image) }}" class="w-16 h-10 object-cover rounded shadow-sm" alt="{{ $p->name }}">
                            @else
                                <div class="w-16 h-10 bg-slate-100 rounded flex items-center justify-center">
                                    <i class="bi bi-image text-slate-300"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-4 font-bold text-slate-800">{{ $p->name }}</td>
                        <td class="px-4 py-4 text-slate-600 font-medium">{{ $p->duration }}</td>
                        <td class="px-4 py-4 font-bold text-primary">{{ $p->price }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <a href="/admin/paket/{{ $p->id }}/edit" 
                                   class="btn-icon text-blue-600 bg-blue-50 hover:bg-blue-600 hover:text-white w-8 h-8 rounded flex items-center justify-center transition-all"
                                   title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form method="POST" action="/admin/paket/{{ $p->id }}" class="inline" onsubmit="return confirm('Hapus data ini?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 bg-red-50 hover:bg-red-600 hover:text-white w-8 h-8 rounded flex items-center justify-center transition-all"
                                            title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
