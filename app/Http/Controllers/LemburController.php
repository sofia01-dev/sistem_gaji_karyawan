<?php

namespace App\Http\Controllers;

use App\Models\Lembur;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class LemburController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lembur = Lembur::with('karyawan.jabatan')->get();
        return view('lembur.index', compact('lembur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawan = Karyawan::all();
        return view('lembur.create', compact('karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'jam_lembur' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
        ]);

        Lembur::create([
            'karyawan_id' => $request->karyawan_id,
            'jam_lembur' => $request->jam_lembur,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
        ]);

        return redirect('/lembur')->with('success', 'Data lembur berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lembur $lembur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lembur $lembur)
    {
        $karyawan = Karyawan::all();
        return view('lembur.edit', compact('lembur', 'karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lembur $lembur)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'jam_lembur' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
        ]);

        $lembur->update($request->all());
        return redirect('/lembur')->with('success', 'Data lembur berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lembur $lembur)
    {
        $lembur->delete();
        return redirect('/lembur')->with('success', 'Data lembur berhasil dihapus');
    }
}
