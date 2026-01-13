@extends('admin.layouts.app')

@section('header', 'Tambah Hotel Baru')

@section('content')
<div class="max-w-3xl mx-auto">
    <!-- Back Button -->
    <a href="/admin/hotel" class="inline-flex items-center gap-2 text-slate-500 hover:text-primary transition-colors mb-6 text-sm font-medium">
        <i class="bi bi-arrow-left"></i>
        Kembali ke Daftar
    </a>

    <!-- Form Card -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50">
            <h3 class="font-bold text-slate-800 text-sm italic items-center flex gap-2 not-italic">
                <i class="bi bi-plus-circle text-primary"></i>
                Formulir Hotel Baru
            </h3>
        </div>

        <form method="POST" action="/admin/hotel" enctype="multipart/form-data" class="p-6 space-y-5">
            @csrf
            
            <!-- Nama Hotel -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-600 uppercase tracking-wider">Nama Hotel</label>
                <input type="text" name="name" required value="{{ old('name') }}"
                       class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all text-sm"
                       placeholder="Masukkan nama hotel...">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Harga -->
                <div class="space-y-1.5 col-span-2">
                    <label class="text-xs font-bold text-slate-600 uppercase tracking-wider">Harga per Malam</label>
                    <input type="text" name="price" required value="{{ old('price') }}"
                           class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all text-sm"
                           placeholder="Contoh: Rp 500.000">
                </div>
            </div>

            <!-- Lokasi -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-600 uppercase tracking-wider">Lokasi / Alamat</label>
                <input type="text" name="location" required value="{{ old('location') }}"
                       class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all text-sm"
                       placeholder="Contoh: Jl. Malioboro, Yogyakarta">
            </div>

            <!-- Deskripsi -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-600 uppercase tracking-wider">Deskripsi</label>
                <textarea name="description" required rows="4"
                          class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all text-sm"
                          placeholder="Berikan deskripsi singkat tentang hotel ini...">{{ old('description') }}</textarea>
            </div>

            <!-- Upload Foto Utama -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-600 uppercase tracking-wider">Foto Utama Hotel</label>
                <div class="p-4 border-2 border-dashed border-slate-200 rounded-lg bg-slate-50 flex flex-col items-center justify-center gap-2 relative group hover:bg-slate-100 transition-colors">
                    <input type="file" name="image" required class="absolute inset-0 opacity-0 cursor-pointer" id="imageInput">
                    <i class="bi bi-image text-slate-400 text-2xl"></i>
                    <p class="text-xs text-slate-500 font-medium" id="fileNameDisplay">Klik atau seret foto utama ke sini</p>
                </div>
            </div>

            <!-- Upload Galeri -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-600 uppercase tracking-wider">Galeri Foto (Bisa pilih banyak)</label>
                <div class="p-4 border-2 border-dashed border-slate-200 rounded-lg bg-slate-50 flex flex-col items-center justify-center gap-2 relative group hover:bg-slate-100 transition-colors">
                    <input type="file" name="galeri[]" multiple class="absolute inset-0 opacity-0 cursor-pointer" id="galeriInput">
                    <i class="bi bi-images text-slate-400 text-2xl"></i>
                    <p class="text-xs text-slate-500 font-medium" id="galeriNameDisplay">Klik atau seret foto-foto galeri ke sini</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100">
                <button type="reset" class="px-4 py-2 rounded-lg text-slate-500 font-bold text-xs hover:bg-slate-50 transition-colors">
                    Reset
                </button>
                <button type="submit" class="px-6 py-2.5 bg-primary hover:bg-blue-700 text-white font-bold rounded-lg shadow-sm transition-all text-xs">
                    Simpan Data
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

    const gInput = document.getElementById('galeriInput');
    const gDisplay = document.getElementById('galeriNameDisplay');
    gInput.addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            gDisplay.innerText = e.target.files.length + ' foto dipilih';
            gDisplay.classList.add('text-primary');
        }
    });
</script>
@endsection
