<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisStatistik extends Model
{
    use HasFactory;

    public function jenis_statistik()
    {
        return $this->hasMany(Statistik::class);
    }
}
