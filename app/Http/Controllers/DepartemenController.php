<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Menampilkan data departemen
     */
    public function index()
    {
        $departemen = Departemen::all();
        return view('departemen.index', compact('departemen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departemen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['nama_departemen' => 'required']);
        Departemen::create(['nama_departemen' => $request->nama_departemen,]);
        return redirect('/departemen')->with('success', 'Departemen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departemen $departemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $departemen = Departemen::find($id);
        return view('departemen.edit', compact('departemen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_departemen'=>'required',
        ]);

        $departemen = Departemen::find($id);

        $departemen->update([
            'nama_departemen' => $request->nama_departemen
        ]);

        return redirect('/departemen')->with('success', 'Departemen berhasil diupdate.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $departemen = Departemen::find($id);
        $departemen->delete();
        return redirect('/departemen')->with('success', 'Departemen berhasil dihapus.');
    }
}
