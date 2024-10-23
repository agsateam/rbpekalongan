<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $table = 'heroes';

    protected $fillable = [
        'deskripsi',
        'foto1',
        'foto2',
        'foto3',
        'foto4',
        'foto5',
        'foto6'
    ];
}
