<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_karyawan',
        'jenis_kelamin',
        'email',
        'jabatan_id',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function lembur()
    {
        return $this->hasMany(Lembur::class);
    }

    public function gaji()
    {
        return $this->hasMany(Gaji::class);
    }
}
