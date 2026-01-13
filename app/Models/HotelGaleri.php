<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelGaleri extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'foto',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
