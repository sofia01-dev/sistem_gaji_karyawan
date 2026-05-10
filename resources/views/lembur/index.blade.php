@extends('layouts.app')

@section('content')

<div class="page-header">
    <h3 class="page-title">Data Lembur</h3>
    <a href="/lembur/create" class="btn btn-success">+ Tambah Lembur</a>
</div>

<div class="table-box">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-header">
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Jabatan</th>
                <th>Jam Lembur</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($lembur as $l)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $l->karyawan->nama_karyawan }}</td>
                    <td>{{ $l->karyawan->jabatan->nama_jabatan }}</td>
                    <td>{{ $l->jam_lembur }} Jam</td>
                    <td>{{ $l->bulan }}</td>
                    <td>{{ $l->tahun }}</td>
                    <td>
                        <a href="/lembur/{{ $l->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/lembur/{{ $l->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin mengahapus data ini?')">Hapus</button>
                        </form> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>    
@endsection