@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Kategori</h1>
    <div class="mb-4">
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
        Tambah Kategori</a>
    </div>
    <div class="card">
        <div class="card-header">
            List Kategori
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
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
