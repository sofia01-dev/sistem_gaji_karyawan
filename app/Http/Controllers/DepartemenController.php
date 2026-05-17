<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function index()
    {
        $departemen = Departemen::all();
        return view('departemen.index', compact('departemen'));
    }

    public function create()
    {
        return view('departemen.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama_departemen' => 'required']);
        Departemen::create(['nama_departemen' => $request->nama_departemen,]);
        return redirect('/departemen')->with('success', 'Departemen berhasil ditambahkan.');
    }

    public function show(Departemen $departemen)
    {
        //
    }

    public function edit($id)
    {
        $departemen = Departemen::find($id);
        return view('departemen.edit', compact('departemen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['nama_departemen'=>'required',]);

        $departemen = Departemen::find($id);

        $departemen->update(['nama_departemen' => $request->nama_departemen]);

        return redirect('/departemen')->with('success', 'Departemen berhasil diupdate.');

    }

    public function destroy($id)
    {
        $departemen = Departemen::find($id);
        $departemen->delete();
        return redirect('/departemen')->with('success', 'Departemen berhasil dihapus.');
    }
}
