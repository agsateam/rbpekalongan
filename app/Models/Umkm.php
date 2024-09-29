<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Umkm extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function fasilitator() : BelongsTo
    {
        return $this->belongsTo(Fasilitator::class);
    }

    public function products() : HasMany
    {
        return $this->hasMany(Product::class);
    }
}
