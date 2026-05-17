@extends('layouts.app')

@section('content')

<div class="page-header">
    <h3 class="page-title">Edit Jabatan</h3>
</div>

<div class="form-box">
    <form action="/jabatan/{{ $jabatan->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Departemen</label>
            <select name="departemen_id" id="" class="form-control">
                <option value="">Pilih Departemen</option>
                @foreach ($departemen as $d)
                    <option value="{{ $d->id }}"
                        {{ $d->id == $jabatan->departemen_id ? 'selected' : '' }}>
                        {{ $d->nama_departemen }}
                    </option>   
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Jabatan</label>
            <input type="text" name="nama_jabatan" class="form-control" value="{{ $jabatan->nama_jabatan }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Gaji Pokok</label>
            <input type="number" name="gaji_pokok" class="form-control" value="{{ $jabatan->gaji_pokok }}">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/jabatan" class="btn btn-secondary">Kembali</a>
    </form>
</div>   
@endsection