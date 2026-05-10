@extends('layouts.app')

@section('content')

<div class="page-header">
    <h3 class="page-title">Edit Gaji Karyawan</h3>
</div>

<div class="form-box">
    <form action="/gaji/{{ $gaji->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Karyawan</label>
            <input type="text" class="form-control" value="{{ $gaji->karyawan->nama_karyawan }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Tunjangan</label>
            <input type="number" name="tunjangan" class="form-control" value="{{ $gaji->tunjangan }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Bonus</label>
            <input type="number" name="bonus" class="form-control" value="{{ $gaji->bonus }}">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="/gaji" class="btn btn-secondary">Kembali</a>
    </form>
</div>    
@endsection