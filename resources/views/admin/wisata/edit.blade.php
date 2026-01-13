@extends('admin.layouts.app')

@section('header', 'Edit Destinasi Wisata')

@section('content')
<div class="max-w-3xl mx-auto">
    <!-- Back Button -->
    <a href="/admin/wisata" class="inline-flex items-center gap-2 text-slate-500 hover:text-primary transition-colors mb-6 text-sm font-medium">
        <i class="bi bi-arrow-left"></i>
        Kembali ke Daftar
    </a>

    <!-- Form Card -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50">
            <h3 class="font-bold text-slate-800 text-sm italic items-center flex gap-2 not-italic">
                <i class="bi bi-pencil-square text-primary"></i>
                Ubah Data Destinasi
            </h3>
        </div>

        <form method="POST" action="/admin/wisata/{{ $wisata->id }}" enctype="multipart/form-data" class="p-6 space-y-5">
            @csrf
            
            <!-- Nama Wisata -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-600 uppercase tracking-wider">Nama Destinasi</label>
                <input type="text" name="nama" value="{{ $wisata->nama }}" required
                       class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all text-sm">
            </div>

            <!-- Lokasi -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-600 uppercase tracking-wider">Lokasi / Alamat</label>
                <input type="text" name="lokasi" value="{{ $wisata->lokasi }}" required
                       class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all text-sm">
            </div>

            <!-- Deskripsi -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-600 uppercase tracking-wider">Deskripsi</label>
                <textarea name="deskripsi" required rows="4"
                          class="w-full px-4 py-2.5 bg-white border border-slate-300 rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all text-sm">{{ $wisata->deskripsi }}</textarea>
            </div>

            <!-- Upload Foto Sampul -->
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-600 uppercase tracking-wider">Foto Sampul (Hero)</label>
                <div class="flex flex-col md:flex-row gap-4">
                    @php 
                        $isExternal = !str_starts_with($wisata->foto, 'wisata/');
                        $fotoPath = $isExternal ? asset('images/'.$wisata->foto) : asset('storage/'.$wisata->foto);
                    @endphp
<div class="w-32 h-20 rounded border overflow-hidden shrink-0 shadow-sm">
                        <img id="sampulPreview" src="{{ $fotoPath }}" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 p-3 border-2 border-dashed border-slate-200 rounded-lg bg-slate-50 flex flex-col items-center justify-center gap-1 relative group hover:bg-slate-100 transition-colors">
                        <input type="file" name="foto" class="absolute inset-0 opacity-0 cursor-pointer" id="fotoInput">
                        <i class="bi bi-cloud-arrow-up text-slate-400"></i>
                        <p class="text-[10px] text-slate-500 font-medium text-center" id="fileNameDisplay">Klik untuk ganti foto sampul baru</p>
                    </div>
                </div>
            </div>

            <!-- Managemen Galeri -->
            <div class="space-y-3 pt-2">
                <label class="text-xs font-bold text-slate-600 uppercase tracking-wider">Galeri Foto</label>
                
                <!-- New Gallery Upload -->
                <div class="p-3 border-2 border-dashed border-slate-200 rounded-lg bg-slate-50 flex flex-col items-center justify-center gap-1 relative group hover:bg-slate-100 transition-colors">
                    <input type="file" name="galeri[]" multiple class="absolute inset-0 opacity-0 cursor-pointer" id="galeriInput">
                    <i class="bi bi-images text-slate-400 text-xl"></i>
                    <p class="text-[10px] text-slate-500 font-medium text-center" id="galeriNameDisplay">Klik untuk tambah foto galeri baru</p>
                </div>
                
                <!-- Preview New Gallery -->
                <div id="galeriPreviewContainer" class="grid grid-cols-3 md:grid-cols-5 gap-3 mt-4 empty:mt-0"></div>

                <!-- Existing Gallery Grid -->
                @if($wisata->galeri->count() > 0)
                <div class="grid grid-cols-3 md:grid-cols-5 gap-3 mt-4">
                    @foreach($wisata->galeri as $item)
                    <div class="relative group aspect-video rounded-lg overflow-hidden border border-slate-100 shadow-sm">
                        <img src="{{ asset('storage/'.$item->foto) }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <button type="button" 
                                    onclick="deleteGaleri({{ $item->id }})"
                                    class="w-7 h-7 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors">
                                <i class="bi bi-trash text-xs"></i>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Action Buttons -->
            <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100">
                <a href="/admin/wisata" class="px-4 py-2 rounded-lg text-slate-500 font-bold text-xs hover:bg-slate-50 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-primary hover:bg-blue-700 text-white font-bold rounded-lg shadow-sm transition-all text-xs">
                    Update Data
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<form id="deleteGaleriForm" method="POST" class="hidden">
    @csrf @method('DELETE')
</form>

<script>
    function deleteGaleri(id) {
        if (confirm('Hapus foto ini dari galeri?')) {
            const form = document.getElementById('deleteGaleriForm');
            form.action = `/admin/wisata/galeri/${id}`;
            form.submit();
        }
    }

    // Preview Foto Sampul
    const input = document.getElementById('fotoInput');
    const display = document.getElementById('fileNameDisplay');
    const preview = document.getElementById('sampulPreview');

    input.addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            const file = e.target.files[0];
            display.innerText = file.name;
            display.classList.add('text-primary');

            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });

    // Preview Galeri Foto
    const gInput = document.getElementById('galeriInput');
    const gDisplay = document.getElementById('galeriNameDisplay');
    const gPreview = document.getElementById('galeriPreviewContainer');

    let currentFiles = new DataTransfer();

    gInput.addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            // Add new files to currentFiles
            Array.from(e.target.files).forEach(file => {
                currentFiles.items.add(file);
            });
            
            updateGalleryPreviews();
        }
    });

    function updateGalleryPreviews() {
        // Update input files
        gInput.files = currentFiles.files;

        // Update Text
        if (currentFiles.files.length > 0) {
            gDisplay.innerText = currentFiles.files.length + ' foto dipilih';
            gDisplay.classList.add('text-primary');
        } else {
            gDisplay.innerText = 'Klik untuk tambah foto galeri baru';
            gDisplay.classList.remove('text-primary');
        }
        
        // Clear and rebuild previews
        gPreview.innerHTML = '';
        
        Array.from(currentFiles.files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const div = document.createElement('div');
                div.className = 'relative group aspect-video rounded-lg overflow-hidden border border-slate-100 shadow-sm';
                div.innerHTML = `
                    <img src="${e.target.result}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <button type="button" 
                                onclick="removeNewFile(${index})"
                                class="w-7 h-7 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors">
                            <i class="bi bi-x text-lg"></i>
                        </button>
                    </div>
                `;
                gPreview.appendChild(div);
            }
            reader.readAsDataURL(file);
        });
    }

    window.removeNewFile = function(index) {
        const dt = new DataTransfer();
        const files = currentFiles.files;
        
        for (let i = 0; i < files.length; i++) {
            if (i !== index) {
                dt.items.add(files[i]);
            }
        }
        
        currentFiles = dt;
        updateGalleryPreviews();
    }
</script>
@endpush
@endsection
