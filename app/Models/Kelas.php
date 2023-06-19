<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function pembelajaran()
    {
        return $this->hasMany(Pembelajaran::class);
    }
}
