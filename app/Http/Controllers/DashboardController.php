<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\Gaji;

class DashboardController extends Controller
{
    public function index() {
    //hitung data
    $jumlah_departemen = Departemen::count();
    $jumlah_jabatan = Jabatan::count();
    $jumlah_karyawan = Karyawan::count();
    $total_gaji = Gaji::sum('total_gaji');

    return view('dashboard', compact(
        'jumlah_departemen',
        'jumlah_jabatan',
        'jumlah_karyawan',
        'total_gaji'
    ));

    }
}
