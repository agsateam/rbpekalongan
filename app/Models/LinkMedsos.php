<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkMedsos extends Model
{
    use HasFactory;

    protected $table = 'link_medsos';

    protected $fillable = [
        'shoppe',
        'tokopedia',
        'tiktok',
        'instagram'
    ];
}
