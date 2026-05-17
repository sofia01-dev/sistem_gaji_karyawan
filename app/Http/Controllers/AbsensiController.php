<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with('karyawan.jabatan')->get();
        return view('absensi.index', compact('absensi'));
    }

    public function create()
    {
        $karyawan = Karyawan::all();
        return view('absensi.create', compact('karyawan'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'izin' => 'required',
            'sakit' => 'required',
            'alpha' => 'required',
            'terlambat' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
        ]);

        Absensi::create([
            'karyawan_id' => $request->karyawan_id,
            'izin' => $request->izin,
            'sakit' => $request->sakit,
            'alpha' => $request->alpha,
            'terlambat' => $request->terlambat,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
        ]);

        return redirect('/absensi')->with('success', 'Data absensi berhasil ditambahkan');
    }

    public function show(Absensi $absensi)
    {
        //
    }

    public function edit(Absensi $absensi)
    {
        $karyawan = Karyawan::all();
        return view('absensi.edit', compact('absensi', 'karyawan'));
    }

    public function update(Request $request, Absensi $absensi)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'izin' => 'required',
            'sakit' => 'required',
            'alpha' => 'required',
            'terlambat' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
        ]);

        $absensi->update($request->all());
        return redirect('/absensi')->with('success', 'Data absen berhasil diupdate');
    }

    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return redirect('/absensi')->with('success', 'Data absensi berhasil dihapus');
    }
}
