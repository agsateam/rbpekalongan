<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function room(): BelongsTo
    {
        return $this->belongsTo(BookingRoom::class);
    }

    public function time(): BelongsTo
    {
        return $this->belongsTo(BookingTime::class);
    }
}
