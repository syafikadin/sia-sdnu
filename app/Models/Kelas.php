<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $guarded = [
        'id',
    ];

    use HasFactory;

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function pembelajaran()
    {
        return $this->hasMany(Pembelajaran::class);
    }

    public function tapel()
    {
        return $this->belongsTo(Tapel::class);
    }

    public function anggota_kelas()
    {
        return $this->hasMany(AnggotaKelas::class);
    }
}
