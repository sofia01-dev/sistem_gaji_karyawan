<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembur extends Model
{
    use HasFactory;
    protected $fillable = [
        'karyawan_id',
        'jam_lembur',
        'bulan',
        'tahun',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
