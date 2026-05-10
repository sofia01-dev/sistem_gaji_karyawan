@extends('layouts.app')

@section('content')
    
    <div class="page-header">
        <h3 class="page-title">Tambah Absensi</h3>
    </div>

    <div class="form-box">
        <form action="/absensi" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Karyawan</label>
                <select name="karyawan_id" id="" class="form-control">
                    <option value="">Pilih Karyawan</option>

                    @foreach ($karyawan as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_karyawan }}</option>    
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Izin</label>
                <input type="number" name="izin" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Sakit</label>
                <input type="number" name="sakit" class="form-control">
            </div>

             <div class="mb-3">
                <label class="form-label">Alpha</label>
                <input type="number" name="alpha" class="form-control">
            </div>

             <div class="mb-3">
                <label class="form-label">Terlambat</label>
                <input type="number" name="terlambat" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Bulan</label>
                <select name="bulan" id="" class="form-control">
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tahun</label>
                <input type="number" name="tahun" id="" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="/absensi" class="btn btn-secondary">kembali</a>
        </form>
    </div>
@endsection