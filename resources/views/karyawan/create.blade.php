@extends('layouts.app')

@section('content')

<div class="page-header">
    <h3 class="page-title">Tambah Karyawan</h3>
</div>

<div class="form-box">
    <form action="/karyawan" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Karyawan</label>
            <input type="text" name="nama_karyawan" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="" class="form-control">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <select name="jabatan_id" id="" class="form-control">
                <option value="">Pilih Jabatan</option>

                @foreach ($jabatan as $j)
                    <option value="{{ $j->id }}">{{ $j->nama_jabatan }}</option>   
                @endforeach

            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/karyawan" class="btn btn-secondary">Kembali</a>
    </form>
</div>
    
@endsection