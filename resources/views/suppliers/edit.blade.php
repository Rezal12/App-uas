@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Pemasok</h1>
    
    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $supplier->name }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea class="form-control" id="address" name="address" rows="3" required>{{ $supplier->address }}</textarea>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $supplier->phone_number }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui Pemasok</button>
    </form>
</div>
@endsection
