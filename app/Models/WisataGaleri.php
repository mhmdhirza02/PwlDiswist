<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WisataGaleri extends Model
{
    protected $table = 'wisata_galeri';
    protected $fillable = ['wisata_id', 'foto'];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }
}
