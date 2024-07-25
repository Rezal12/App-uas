@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1 class="mb-4">Edit Buku</h1>
            <form action="{{ route('books.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $book->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="supplier_id" class="form-label">Pemasok</label>
                    <select class="form-select" id="supplier_id" name="supplier_id">
                        <option value="">Pilih Pemasok</option>
                        @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ isset($book) && $book->supplier_id == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Pengarang</label>
                    <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stock" name="stock" value="{{ $book->stock }}" required>
                </div>
                <div class="mb-3">
                    <label for="published_date" class="form-label">Tanggal Terbit</label>
                    <input type="date" class="form-control" id="published_date" name="published_date" value="{{ $book->published_date ? $book->published_date->format('Y-m-d') : '' }}">
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </form>
        </div>
    </div>
</div>
@endsection
