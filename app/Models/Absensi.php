<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $fillable = [
        'karyawan_id',
        'izin',
        'sakit',
        'alpha',
        'terlambat',
        'bulan',
        'tahun',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
