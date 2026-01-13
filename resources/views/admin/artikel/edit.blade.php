@extends('admin.layouts.app')

@section('content')
<h1 class="text-xl font-bold mb-4">Edit Artikel</h1>

<form method="POST" action="/admin/artikel/{{ $artikel->id }}" enctype="multipart/form-data">
@csrf
@method('PUT')

<input name="judul" value="{{ $artikel->judul }}" class="border p-2 w-full mb-4">

<textarea name="konten" class="border p-2 w-full mb-4">{{ $artikel->konten }}</textarea>

<input type="file" name="thumbnail" class="mb-4">

<button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
