<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::with('jabatan.departemen')->get();
        return view('karyawan.index', compact('karyawan'));
    }

    public function create()
    {
        $jabatan = Jabatan::all();
        return view('karyawan.create', compact('jabatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'jabatan_id' => 'required',
        ]);

        Karyawan::create([
            'nama_karyawan' => $request->nama_karyawan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'jabatan_id' => $request->jabatan_id,
        ]);

        return redirect('/karyawan')->with('success', 'Data karyawan berhasil ditambahkan');
    }

    public function show(Karyawan $karyawan)
    {
        //
    }

    public function edit(Karyawan $karyawan)
    {
        $jabatan = Jabatan::all();
        return view('karyawan.edit', compact('karyawan', 'jabatan'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nama_karyawan' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'jabatan_id' => 'required',
        ]);

        $karyawan->update($request->all());
        return redirect('/karyawan')->with('success', 'Data karyawan berhasil diupdate');
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect('/karyawan')->with('success', 'Data karyawan berhasil dihapus');
    }
}