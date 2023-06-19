<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    public function pembelajaran()
    {
        return $this->belongsTo(Pembelajaran::class);
    }

    public function anggota_kelas()
    {
        return $this->belongsTo(AnggotaKelas::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
