<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $fillable = [

        'id' ,	'kos_id', 'luas_kamar', 'ukuran_kamar' ,'jumlah_kasur', 'biaya_perbulan', 'status', 	
    ];

    public function kos()
    {
        return $this->belongsTo(Kos::class, 'kos_id');
    }

    public function galleryKamar()
    {
        return $this->hasMany(Gambar_kamar::class, 'kamar_id');
    }

    public function fasilitas()
    {
        return $this->belongsToMany('App\Models\Fasilitas');
    }
}
