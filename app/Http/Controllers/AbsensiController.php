<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensi = Absensi::with('karyawan.jabatan')->get();
        return view('absensi.index', compact('absensi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawan = Karyawan::all();
        return view('absensi.create', compact('karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        $karyawan = Karyawan::all();
        return view('absensi.edit', compact('absensi', 'karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return redirect('/absensi')->with('success', 'Data absensi berhasil dihapus');
    }
}
