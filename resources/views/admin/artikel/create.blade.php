@extends('admin.layouts.app')

@section('content')
<h1 class="text-xl font-bold mb-4">Tambah Artikel</h1>

<form method="POST" action="/admin/artikel" enctype="multipart/form-data">
@csrf

<input name="judul" placeholder="Judul" class="border p-2 w-full mb-4">

<textarea name="konten" class="border p-2 w-full mb-4"></textarea>

<input type="file" name="thumbnail" class="mb-4">

<button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection
