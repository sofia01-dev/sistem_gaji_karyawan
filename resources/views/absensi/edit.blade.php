@extends('layouts.app')

@section('content')

<div class="page-header">
    <h3 class="page-title">Edit Absensi</h3>
</div>

<div class="form-box">
    <form action="/absensi/{{ $absensi->id }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label class="form-label">Karyawan</label>
            <select name="karyawan_id" id="" class="form-control">
                @foreach ($karyawan as $k)
                    <option value="{{ $k->id }}" {{ $absensi->karyawan_id == $k->id ? 'selected' : ''}}>
                        {{ $k->nama_karyawan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Izin</label>
            <input type="number" name="izin" class="form-control" value="{{ $absensi->izin }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Sakit</label>
            <input type="number" name="sakit" class="form-control" value="{{ $absensi->sakit }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Alpha</label>
            <input type="number" name="alpha" class="form-control" value="{{ $absensi->alpha }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Terlambat</label>
            <input type="number" name="terlambat" class="form-control" value="{{ $absensi->terlambat }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Bulan</label>
            <select name="bulan" id="" class="form-control">
                <option value="Januari" {{ $absensi->bulan == 'Januari' ? 'selected' : ''}}>Januari</option>
                <option value="Februari" {{ $absensi->bulan == 'Februari' ? 'selected' : ''}}>Februari</option>
                <option value="Maret" {{ $absensi->bulan == 'Maret' ? 'selected' : ''}}>Maret</option>
                <option value="April" {{ $absensi->bulan == 'April' ? 'selected' : ''}}>April</option>
                <option value="Mei" {{ $absensi->bulan == 'Mei' ? 'selected' : ''}}>Mei</option>
                <option value="Juni" {{ $absensi->bulan == 'Juni' ? 'selected' : ''}}>Juni</option>
                <option value="Juli" {{ $absensi->bulan == 'Juli' ? 'selected' : ''}}>Juli</option>
                <option value="Agustus" {{ $absensi->bulan == 'Agustus' ? 'selected' : ''}}>Agustus</option>
                <option value="September" {{ $absensi->bulan == 'September' ? 'selected' : ''}}>September</option>
                <option value="Oktober" {{ $absensi->bulan == 'Oktober' ? 'selected' : ''}}>Oktober</option>
                <option value="November" {{ $absensi->bulan == 'November' ? 'selected' : ''}}>November</option>
                <option value="Desember" {{ $absensi->bulan == 'Desember' ? 'selected' : ''}}>Desember</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="tahun">Tahun</label>
            <input type="number" name="tahun" id="" class="form-control" value="{{ $absensi->tahun }}">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="/absensi" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection