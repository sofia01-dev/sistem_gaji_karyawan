<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'departemen_id',
        'nama_jabatan',
        'gaji_pokok',
    ];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
}
