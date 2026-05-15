@extends('layouts.app')

@section('content')

<h3 class="mb-4">Selamat Datang di Sistem Gaji Karyawan</h3>

<div class="row">

    <div class="col-md-3 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <h6>Total Departemen</h6>
                <h2>{{ $jumlah_departemen }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card shadow">
                <div class="card-body">                   
                    <h6>Total Jabatan</h6>
                    <h2>{{ $jumlah_jabatan }}</h2>
                </div>
            </div>
         </div>

    <div class="col-md-3 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <h6>Total Karyawan</h6>
                <h2>{{ $jumlah_karyawan }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <h6>Total Gaji</h6>
                <h5>Rp {{ number_format($total_gaji,0,',','.') }}</h5>
            </div>
        </div>
    </div>

</div>
@endsection