@extends('layouts.app')

@section('content')

<div class="page-header">
    <h3 class="page-title">Data Departemen</h3>
    <a href="/departemen/create" class="btn btn-success">Tambah Departemen</a>
</div>

<div class="table-box">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-header">
            <tr>
                <th>No</th>
                <th>Nama Departemen</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($departemen as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->nama_departemen }}</td>
                    <td>
                        <a href="/departemen/{{ $d->id }}/edit"  class="btn btn-warning btn-sm">Edit</a>
                        <form action="/departemen/{{ $d->id }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>                           
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection