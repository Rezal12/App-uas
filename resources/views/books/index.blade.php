@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Buku</h1>
    <div class="mb-4">
        <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Buku</a>
    </div>
    <div class="card">
        <div class="card-header">
            List Buku
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Pemasok</th>
                            <th>Penulis</th>
                            <th>Stok</th>
                            <th>Tahun Terbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->description }}</td>
                            <td>{{ optional($book->category)->name }}</td>
                            <td>{{ optional($book->supplier)->name }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->stock }}</td>
                            <td>{{ $book->published_date }}</td>
                            <td>
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
