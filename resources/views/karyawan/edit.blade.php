@extends('layouts.app')

@section('content')

<div class="page-header">
    <h3 class="page-title">Edit Karyawan</h3>
</div>

<div class="form-box">
    <form action="/karyawan/{{ $karyawan->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Karyawan</label>
            <input type="text" name="nama_karyawan" class="form-control" value="{{ $karyawan->nama_karyawan }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="" class="form-control">
                <option value="L" {{ $karyawan->jenis_kelamin == 'L' ? 'selected' : ''}}>Laki-laki</option>
                <option value="P" {{ $karyawan->jenis_kelamin == 'P' ? 'selected' : ''}}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $karyawan->email }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <select name="jabatan_id" id="" class="form-control">

                @foreach ($jabatan as $j)
                    <option value="{{ $j->id }}"
                        {{ $karyawan->jabatan_id == $j->id ? 'selected' :'' }}>{{ $j->nama_jabatan }}</option>                    
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="/karyawan" class="btn btn-secondary">Kembali</a>
    </form>
</div>   
@endsection