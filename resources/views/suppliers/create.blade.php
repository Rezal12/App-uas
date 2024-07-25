@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah Pemasok</h1>
    
    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Pemasok</button>
    </form>
</div>
@endsection
