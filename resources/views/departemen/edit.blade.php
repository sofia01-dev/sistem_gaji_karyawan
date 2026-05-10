@extends('layouts.app')

@section('content')

<div class="page-header">
    <h3 class="page-title">Edit Departemen</h3>
</div>

<div class="form-box">
    <form action="/departemen/{{ $departemen->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Departemen</label>
            <input type="text" name="nama_departemen" class="form-control"                 
                value="{{ $departemen->nama_departemen }}"
                placeholder="Masukkan nama departemen">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/departemen" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection