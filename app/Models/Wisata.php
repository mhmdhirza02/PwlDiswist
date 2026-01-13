<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table = 'wisata';

    protected $fillable = [
        'nama',
        'deskripsi',
        'lokasi',
        'foto'
    ];
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function galeri()
    {
        return $this->hasMany(WisataGaleri::class, 'wisata_id');
    }
}
