@extends('layouts.app')

@section('content')

<div class="page-header">
    <h3 class="page-title">Tambah Departemen</h3>
</div>

<div class="form-box">
    <form action="/departemen" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Departemen</label>
            <input type="text" name="nama_departemen" class="form-control" placeholder="Masukkan nama departemen">         
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/departemen" class="btn btn-secondary"> Kembali</a>
    </form>
</div>
@endsection