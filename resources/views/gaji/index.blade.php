@extends('layouts.app')

@section('content')

<div class="page-header">
    <h3 class="page-title">Data Gaji Karyawan</h3>
    <a href="/gaji/create" class="btn btn-success">Proses Gaji</a>
</div>

<div class="table-box">
    <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-header">
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Jabatan</th>
                <th>Gaji Pokok</th>
                <th>Gaji Lembur</th>
                <th>Tunjangan</th>
                <th>Bonus</th>
                <th>Bonus Lembur</th>
                <th>Bonus Disiplin</th>
                <th>Potongan</th>
                <th>Total Gaji</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($gaji as $g)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $g->karyawan->nama_karyawan }}</td>
                    <td>{{ $g->karyawan->jabatan->nama_jabatan }}</td>
                    <td>Rp {{ number_format($g->gaji_pokok,0,',','.') }}</td>
                    <td>Rp {{ number_format($g->gaji_lembur,0,',','.') }}</td>
                    <td>Rp {{ number_format($g->tunjangan,0,',','.') }}</td>
                    <td>Rp {{ number_format($g->bonus,0,',','.') }}</td>
                    <td>Rp {{ number_format($g->bonus_lembur,0,',','.') }}</td>
                    <td>Rp {{ number_format($g->bonus_disiplin,0,',','.') }}</td>
                    <td>Rp {{ number_format($g->potongan,0,',','.') }}</td>
                    <td>
                        <strong>
                            Rp {{  number_format($g->total_gaji,0,',','.') }}
                        </strong>
                    </td>
                    <td>{{ $g->bulan }}</td>
                    <td>{{ $g->tahun }}</td>
                    <td>
                        <a href="/gaji/{{ $g->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/gaji/{{ $g->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>                
            @endforeach
        </tbody>
    </table>
    </div>
</div>    
@endsection