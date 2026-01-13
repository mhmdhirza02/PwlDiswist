@extends('admin.layouts.app')

@section('header', 'Edit Kuliner')

@section('content')
<div class="max-w-3xl mx-auto">
    <!-- Back Button -->
    <a href="/admin/kuliner" class="inline-flex items-center gap-2 text-slate-500 hover:text-primary transition-colors mb-6 text-sm font-medium">
        <i class="bi bi-arrow-left"></i>
        Kembali ke Daftar
    </a>

    <!-- Form Card -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50">
            <h3 class="font-bold text-slate-800 text-sm italic items-center flex gap-2 not-italic">
                <i class="bi bi-pencil-square text-primary"></i>
                Edit Data Kuliner: {{ $kuliner->name }}
            </h3>
        </div>

        <form method="POST" action="/admin/kuliner/{{ $kuliner->id }}" enctype="multipart/form-data" class="p-6 space-y-5">
            @csrf
            @method('PUT')
            
            <!-- Nama Kuliner -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-600 uppercase tracking-wider">Nama Tempat / Makanan</label>
                <input type="text" name="name" required value="{{ old('name', $kuliner->name) }}"
                       class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all text-sm"
                       placeholder="Contoh: Gudeg Yu Djum">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Kategori -->
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-slate-600 uppercase tracking-wider">Kategori</label>
                    <input type="text" name="category" required value="{{ old('category', $kuliner->category) }}"
                           class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all text-sm"
                           placeholder="Contoh: Makanan Tradisional">
                </div>

                <!-- Harga -->
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-slate-600 uppercase tracking-wider">Rentang Harga</label>
                    <input type="text" name="price_range" required value="{{ old('price_range', $kuliner->price_range) }}"
                           class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all text-sm"
                           placeholder="Contoh: Rp 15.000 - Rp 50.000">
                </div>
            </div>
            <!-- Alamat -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-600 uppercase tracking-wider">Alamat / Lokasi</label>
                <input type="text" name="address" required value="{{ old('address', $kuliner->address) }}"
                       class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all text-sm"
                       placeholder="Contoh: Jl. Wijilan, Yogyakarta">
            </div>

            <!-- Deskripsi -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-600 uppercase tracking-wider">Deskripsi</label>
                <textarea name="description" required rows="4"
                          class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all text-sm"
                          placeholder="Berikan deskripsi singkat tentang kuliner ini...">{{ old('description', $kuliner->description) }}</textarea>
            </div>

            <!-- Preview & Upload Foto -->
            <div class="space-y-3">
                <label class="text-xs font-bold text-slate-600 uppercase tracking-wider text-block">Foto Kuliner</label>
                
                @if($kuliner->image)
                <div class="mb-2">
                    <p class="text-[10px] text-slate-400 font-bold uppercase mb-1">Foto Saat Ini:</p>
                    <img src="{{ asset('storage/'.$kuliner->image) }}" class="w-16 h-10 object-cover rounded-lg border border-slate-200" alt="Current Photo">
                </div>
                @endif

                <div class="p-4 border-2 border-dashed border-slate-200 rounded-lg bg-slate-50 flex flex-col items-center justify-center gap-2 relative group hover:bg-slate-100 transition-colors">
                    <input type="file" name="image" class="absolute inset-0 opacity-0 cursor-pointer" id="imageInput">
                    <i class="bi bi-cloud-arrow-up text-slate-400 text-2xl"></i>
                    <p class="text-xs text-slate-500 font-medium" id="fileNameDisplay">Klik untuk ganti foto (Kosongkan jika tidak ingin ganti)</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100">
                <a href="/admin/kuliner" class="px-4 py-2 rounded-lg text-slate-500 font-bold text-xs hover:bg-slate-50 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-primary hover:bg-blue-700 text-white font-bold rounded-lg shadow-sm transition-all text-xs">
                    Perbarui Data
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const input = document.getElementById('imageInput');
    const display = document.getElementById('fileNameDisplay');
    input.addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            display.innerText = e.target.files[0].name;
            display.classList.add('text-primary');
        }
    });
</script>
@endsection
