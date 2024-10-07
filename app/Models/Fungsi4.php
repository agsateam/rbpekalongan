<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fungsi4 extends Model
{
    use HasFactory;

    protected $table = 'fungsi4';

    protected $fillable = [
        'fungsi_id',
        'deskripsi',
        'foto1',
        'foto2',
        'foto3',
        'foto4',
        'foto5',
    ];


    public function fungsi()
    {
        return $this->belongsTo(Fungsi::class, 'fungsi_id');
    }
}
