<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Departemen;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatan = Jabatan::with('departemen')->get();
        return view('jabatan.index', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departemen = Departemen::all();
        return view('jabatan.create', compact('departemen'));
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatan)
    {
        $departemen = Departemen::all();
        return view('jabatan.edit', compact('jabatan', 'departemen'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();
        return redirect('/jabatan')->with('success', 'Data jabatan berhasil di hapus');
    }
}
