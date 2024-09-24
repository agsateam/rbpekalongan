<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Umkm extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function certification() : BelongsTo
    {
        return $this->belongsTo(Fasilitator::class);
    }
}
