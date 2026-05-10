@extends('layouts.app')

@section('content')

<div class="page-header">
    <h3 class="page-title">Edit Lembur</h3>
</div>
    
<div class="form-box">
    <form action="/lembur/{{ $lembur->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Karyawan</label>
            <select name="karyawan_id" id="" class="form-control">
                @foreach ($karyawan as $k)
                    <option value="{{ $k->id }}" {{ $lembur->karyawan_id == $k->id ? 'selected' : ''}}>
                        {{ $k->nama_karyawan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Jam Lembur</label>
            <input type="number" name="jam_lembur" class="form-control" value="{{ $lembur->jam_lembur }}">
        </div>

        <div class="mb-3">
            <label class="Bulan">Bulan</label>
            <select name="bulan" id="" class="form-control">
                <option value="Januari" {{ $lembur->bulan == 'Januari' ? 'selected' : ''}}>Januari</option>
                <option value="Februari" {{ $lembur->bulan == 'Februari' ? 'selected' : ''}}>Februari</option>
                <option value="Maret" {{ $lembur->bulan == 'Maret' ? 'selected' : ''}}>Maret</option>
                <option value="April" {{ $lembur->bulan == 'April' ? 'selected' : ''}}>April</option>
                <option value="Mei" {{ $lembur->bulan == 'Mei' ? 'selected' : ''}}>Mei</option>
                <option value="Juni" {{ $lembur->bulan == 'Juni' ? 'selected' : ''}}>Juni</option>
                <option value="Juli" {{ $lembur->bulan == 'Juli' ? 'selected' : ''}}>Juli</option>
                <option value="Agustus" {{ $lembur->bulan == 'Agustus' ? 'selected' : ''}}>Agustus</option>
                <option value="September" {{ $lembur->bulan == 'September' ? 'selected' : ''}}>September</option>
                <option value="Oktober" {{ $lembur->bulan == 'Oktober' ? 'selected' : ''}}>Oktober</option>
                <option value="November" {{ $lembur->bulan == 'November' ? 'selected' : ''}}>November</option>
                <option value="Desember" {{ $lembur->bulan == 'Desember' ? 'selected' : ''}}>Desember</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="tahun">Tahun</label>
            <input type="number" name="tahun" id="" class="form-control" value="{{ $lembur->tahun }}">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="/lembur" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection