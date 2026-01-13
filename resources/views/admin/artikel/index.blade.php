@extends('admin.layouts.app')

@section('header', 'Kelola Artikel & Berita')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <p class="text-slate-500 text-sm font-medium">Berikan informasi terbaru dan tips wisata untuk pengunjung Diswist.</p>
        </div>
        <a href="/admin/artikel/create"
           class="bg-gradient-to-r from-primary to-secondary text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-primary/20 hover:shadow-xl hover:-translate-y-0.5 transition-all text-sm flex items-center gap-2">
            <i class="bi bi-pencil-plus"></i>
            Tulis Artikel Baru
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left bg-slate-50/50 border-b border-slate-100 uppercase tracking-wider text-[11px] font-bold text-slate-400">
                        <th class="px-8 py-5">No.</th>
                        <th class="px-4 py-5">Thumbnail</th>
                        <th class="px-4 py-5">Judul Artikel</th>
                        <th class="px-4 py-5">Tanggal Dibuat</th>
                        <th class="px-8 py-5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($artikel as $index => $a)
                    <tr class="hover:bg-slate-50/50 transition-all group">
                        <td class="px-8 py-4 font-bold text-slate-400 text-xs">{{ $index + 1 }}</td>
                        <td class="px-4 py-4 min-w-[120px]">
                            <div class="relative w-20 h-14 rounded-lg overflow-hidden shadow-sm border border-slate-100 group-hover:rotate-1 transition-transform">
                                <img src="{{ asset('storage/'.$a->thumbnail) }}" class="w-full h-full object-cover" alt="{{ $a->judul }}">
                            </div>
                        </td>
                        <td class="px-4 py-4 max-w-md">
                            <p class="font-bold text-slate-800 text-sm line-clamp-2 leading-snug group-hover:text-primary transition-colors">{{ $a->judul }}</p>
                        </td>
                        <td class="px-4 py-4">
                            <span class="text-xs text-slate-500 font-medium">
                                <i class="bi bi-calendar3 mr-1 text-slate-300"></i>
                                {{ $a->created_at->format('d M Y') }}
                            </span>
                        </td>
                        <td class="px-8 py-4 text-right">
                            <div class="flex items-center justify-end gap-2 translate-x-2 opacity-100 md:opacity-0 group-hover:opacity-100 group-hover:translate-x-0 transition-all">
                                <a href="/admin/artikel/{{ $a->id }}/edit" 
                                   class="w-8 h-8 rounded-lg bg-blue-50 text-blue-500 flex items-center justify-center hover:bg-blue-500 hover:text-white transition-all shadow-sm"
                                   title="Edit Artikel">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form method="POST" action="/admin/artikel/{{ $a->id }}" class="inline" onsubmit="return confirm('Hapus artikel ini?')">
                                    @csrf @method('DELETE')
                                    <button class="w-8 h-8 rounded-lg bg-red-50 text-red-500 flex items-center justify-center hover:bg-red-500 hover:text-white transition-all shadow-sm"
                                            title="Hapus Artikel">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @if(count($artikel) == 0)
                    <tr>
                        <td colspan="5" class="py-20 text-center">
                            <div class="flex flex-col items-center gap-3">
                                <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center text-slate-200">
                                    <i class="bi bi-file-earmark-text text-3xl"></i>
                                </div>
                                <p class="text-slate-400 font-medium italic">Belum ada artikel yang ditulis.</p>
                            </div>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
