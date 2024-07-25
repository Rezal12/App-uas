@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Pemasok</h1>
    <div class="mb-4">
        <a href="{{ route('suppliers.create') }}" class="btn btn-primary">Tambah Supplier</a>
    </div>
    <div class="card">
        <div class="card-header">
            List Pemasok
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($suppliers as $supplier)
                        <tr>
                            <td>{{ $supplier->id }}</td>
                            <td>{{ $supplier->name }}</td>
                            <td>{{ $supplier->address }}</td>
                            <td>{{ $supplier->phone_number }}</td>
                            <td>
                                <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" class="d-inline">
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
