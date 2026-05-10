<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Karyawan;
use App\Models\Absensi;
use App\Models\Lembur;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gaji = Gaji::with('karyawan.jabatan')->get();
        return view('gaji.index', compact('gaji'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawan = Karyawan::all();
        return view('gaji.create', compact('karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $karyawan = Karyawan::with('jabatan')->find($request->karyawan_id);
        $gaji_pokok = $karyawan->jabatan->gaji_pokok;
        $absensi = Absensi::where('karyawan_id', $request->karyawan_id)
            ->where('bulan', $request->bulan)
            ->where('tahun', $request->tahun)
            ->first();

        $lembur = Lembur::where('karyawan_id', $request->karyawan_id)
            ->where('bulan', $request->bulan)
            ->where('tahun', $request->tahun)
            ->first();

        $alpha = $absensi ? $absensi->alpha : 0;
        $terlambat = $absensi ? $absensi->terlambat : 0;
        $jam_lembur = $lembur ? $lembur->jam_lembur : 0;

    /**
     * potongan alpha
     */
        if ($alpha > 0) {
            $potongan_alpha = $alpha * 100000;
        } else {
            $potongan_alpha = 0;
        }

    /**
     * potongan terlambat
     */
        if ($terlambat > 0) {
            $potongan_terlambat = $terlambat * 25000;
        } else {
            $potongan_terlambat = 0;
        }

        $potongan = $potongan_alpha + $potongan_terlambat;

    /**
     * gaji lembur
     */
        if ($jam_lembur > 0) {
            $gaji_lembur = ($gaji_pokok / 173) * $jam_lembur * 1.5;
        } else {
            $gaji_lembur = 0;
        }
        
    /**
     * bonus lembur
     */
        if ($jam_lembur >= 20) {
            $bonus_lembur = 500000;
        } else {
            $bonus_lembur = 0;
        }

    /**
     * bonus disiplin
     */
        if ($alpha == 0 && $terlambat == 0) {
            $bonus_disiplin = 300000;
        } else {
            $bonus_disiplin = 0;
        }

    /**
     * input manual
     */
        $tunjangan = $request->tunjangan;
        $bonus = $request->bonus;

    /**
     * total gaji
     */
        $total_gaji = $gaji_pokok + $gaji_lembur + $tunjangan + $bonus + $bonus_lembur + $bonus_disiplin - $potongan;

        Gaji::create([
            'karyawan_id' => $request->karyawan_id,
            'gaji_pokok' => $gaji_pokok,
            'gaji_lembur' => $gaji_lembur,
            'tunjangan' => $tunjangan,
            'bonus' => $bonus,
            'bonus_lembur' => $bonus_lembur,
            'bonus_disiplin' => $bonus_disiplin,
            'potongan' => $potongan,
            'total_gaji' => $total_gaji,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
        ]);

        return redirect('/gaji')->with('success', 'Data gaji berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gaji $gaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gaji $gaji)
    {
        $karyawan = Karyawan::all();
        return view('gaji.edit', compact('gaji', 'karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gaji $gaji)
    {
        $gaji_pokok = $gaji->gaji_pokok;
        $gaji_lembur = $gaji->gaji_lembur;
        $bonus_lembur = $gaji->bonus_lembur;
        $bonus_disiplin = $gaji->bonus_disiplin;
        $potongan = $gaji->potongan;

        $tunjangan = $request->tunjangan;
        $bonus = $request->bonus;

        $total_gaji = $gaji_pokok + $gaji_lembur + $tunjangan + $bonus + $bonus_lembur + $bonus_disiplin - $potongan;

        $gaji->update([
            'tunjangan' => $request->tunjangan,
            'bonus' => $request->bonus,
            'total_gaji' => $total_gaji,
        ]);

        return redirect('/gaji')->with('success', 'Data gaji berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gaji $gaji)
    {
        $gaji->delete();
        return redirect('/gaji')->with('success', 'Data gaji berhasil dihapus');
    }

    public function getKaryawan($id, $bulan, $tahun)
    {
        $karyawan = Karyawan::with('jabatan')
            ->find($id);

        $absensi = Absensi::where('karyawan_id', $id)
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->first();

        $lembur = Lembur::where('karyawan_id', $id)
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->first();

        return response()->json([

            'nama_karyawan' => $karyawan->nama_karyawan,

            'jabatan' => $karyawan->jabatan->nama_jabatan,

            'gaji_pokok' => $karyawan->jabatan->gaji_pokok,

            'alpha' => $absensi ? $absensi->alpha : 0,

            'terlambat' => $absensi ? $absensi->terlambat : 0,

            'jam_lembur' => $lembur ? $lembur->jam_lembur : 0,

        ]);
    }

}
