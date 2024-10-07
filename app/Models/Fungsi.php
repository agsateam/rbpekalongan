<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fungsi extends Model
{
    use HasFactory;

    protected $table = 'fungsis';


    public function fungsi1()
    {
        return $this->hasMany(Fungsi1::class);
    }


    public function fungsi2()
    {
        return $this->hasMany(Fungsi2::class);
    }


    public function fungsi3()
    {
        return $this->hasMany(Fungsi3::class);
    }


    public function fungsi4()
    {
        return $this->hasMany(Fungsi4::class);
    }


    public function fungsi5()
    {
        return $this->hasMany(Fungsi5::class);
    }
}
