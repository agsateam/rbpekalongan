<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Statistik extends Model
{
    use HasFactory;

    protected $table = 'statistiks';

    protected $fillable = [
        'jumlah',
        'tahun',
        'jenis_statistiks_id'
    ];

    public function statistiks()
    {
        return $this->belongsTo(JenisStatistik::class);
    }
}
