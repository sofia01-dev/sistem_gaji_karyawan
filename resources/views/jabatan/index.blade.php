@extends('layouts.app')

@section('content')

<div class="page-header">
    <h3 class="page-title">Data Jabatan</h3>
    <a href="/jabatan/create" class="btn btn-success">Tambah Jabatan</a>
</div>

<div class="table-box">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-header">
            <tr>
                <th>No</th>
                <th>Departemen</th>
                <th>Nama Jabatan</th>
                <th>Gaji Pokok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($jabatan as $j)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $j->departemen->nama_departemen }}</td>
                    <td>{{ $j->nama_jabatan }}</td>
                    <td>Rp {{ number_format($j->gaji_pokok, 0, ',', '.') }}</td>
                    <td>
                        <a href="/jabatan/{{ $j->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/jabatan/{{ $j->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus jabatan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>                
            @endforeach
        </tbody>
    </table>
</div>    
@endsection