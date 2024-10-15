<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FungsiRB extends Model
{
    use HasFactory;

    protected $table = 'fungsi_rbs';

    protected $fillable = [
        'nama_fungsi',
        'deskripsi',
        'foto1',
        'foto2',
        'foto3',
        'foto4',
        'foto5',
    ];
}
