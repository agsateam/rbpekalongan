<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookingRoom extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function times(): HasMany
    {
        return $this->hasMany(BookingTime::class);
    }
}
