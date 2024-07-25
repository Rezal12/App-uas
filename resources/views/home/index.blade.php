@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Dashboard</h1>

    <div class="row">
        <!-- Total Books Card -->
        <div class="col-md-3">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Buku</h5>
                    <p class="card-text display-4">{{ $totalBooks }}</p>
                </div>
            </div>
        </div>

        <!-- Total Categories Card -->
        <div class="col-md-3">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Kategori</h5>
                    <p class="card-text display-4">{{ $totalCategories }}</p>
                </div>
            </div>
        </div>

        <!-- Books Out of Stock Card -->
        <div class="col-md-3">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Books yang Habis</h5>
                    <p class="card-text display-4">{{ $booksOutOfStock }}</p>
                </div>
            </div>
        </div>

        <!-- Total Suppliers Card -->
        <div class="col-md-3">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Pemasok</h5>
                    <p class="card-text display-4">{{ $totalSuppliers }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recently Added Books Table -->
    <h2 class="mt-4 mb-3">Buku Terakhir Ditambahkan</h2>
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Stok</th>
                        <th>Tahun Terbit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentBooks as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->stock }}</td>
                            <td>{{ $book->published_date ? $book->published_date->format('Y-m-d') : 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
