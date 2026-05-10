@extends('layouts.app')

@section('content')

<div class="page-header">
    <h3 class="page-title">Data Karyawan</h3>
    <a href="/karyawan/create" class="btn btn-success">+ Tambah Karyawan</a>
</div>

<div class="table-box">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-header">
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>Jabatan</th>
                <th>Departemen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($karyawan as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->nama_karyawan }}</td>
                    <td>{{ $k->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'}}</td>
                    <td>{{ $k->email }}</td>
                    <td>{{ $k->jabatan->nama_jabatan }}</td>
                    <td>{{ $k->jabatan->departemen->nama_departemen }}</td>
                    <td>
                        <a href="/karyawan/{{ $k->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                        <form action="/karyawan/{{ $k->id }}" method="POST" class="d-inline">
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