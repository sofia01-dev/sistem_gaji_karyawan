<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;
    protected $fillable = [
        'karyawan_id',
        'gaji_pokok',
        'gaji_lembur',
        'tunjangan',
        'bonus',
        'bonus_lembur',
        'bonus_disiplin',
        'potongan',
        'total_gaji',
        'bulan',
        'tahun',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
