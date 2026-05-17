<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Departemen;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatan = Jabatan::with('departemen')->get();
        return view('jabatan.index', compact('jabatan'));
    }

    public function create()
    {
        $departemen = Departemen::all();
        return view('jabatan.create', compact('departemen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'departemen_id' => 'required',
            'nama_jabatan' => 'required',
            'gaji_pokok' => 'required|numeric',
        ]);

        Jabatan::create([
            'departemen_id' => $request->departemen_id,
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok' => $request->gaji_pokok,
        ]);

        return redirect('/jabatan')->with('success', 'Jabatan berhasil ditambahkan.');
    }

    public function show(Jabatan $jabatan)
    {
        //
    }

    public function edit(Jabatan $jabatan)
    {
        $departemen = Departemen::all();
        return view('jabatan.edit', compact('jabatan', 'departemen'));
    }

    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            'departemen_id' => 'required',
            'nama_jabatan' => 'required',
            'gaji_pokok' => 'required|numeric',
        ]);

        $jabatan->update($request->all());

        return redirect('/jabatan')->with('success', 'Jabatan berhasil diperbarui.');
    }

    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();
        return redirect('/jabatan')->with('success', 'Data jabatan berhasil di hapus');
    }
}