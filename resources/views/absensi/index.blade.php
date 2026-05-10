@extends('layouts.app')

@section('content')

<div class="page-header">
    <h3 class="page-title">Data Absensi</h3>
    <a href="/absensi/create" class="btn btn-success">+ Tambah Absensi</a>
</div>

<div class="table-box">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-header">
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Jabatan</th>
                <th>Izin</th>
                <th>Sakit</th>
                <th>Alpha</th>
                <th>Terlambat</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($absensi as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $a->karyawan->nama_karyawan }}</td>
                    <td>{{ $a->karyawan->jabatan->nama_jabatan }}</td>
                    <td>{{ $a->izin }}</td>
                    <td>{{ $a->sakit }}</td>
                    <td>{{ $a->alpha }}</td>
                    <td>{{ $a->terlambat }}</td>
                    <td>{{ $a->bulan }}</td>
                    <td>{{ $a->tahun }}</td>
                    <td>
                        <a href="/absensi/{{ $a->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/absensi/{{ $a->id }}" method="POST" class="d-inline">
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
@endsection