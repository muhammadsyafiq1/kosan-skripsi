<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $fillable = [

        'id' ,	'kos_id', 'luas_kamar', 'ukuran_kamar' ,'jumlah_kasur', 'biaya_perbulan', 'status', 'created_at', 'updated_at' 	
    ];

    public function kos()
    {
        return $this->belongsTo(Kos::class, 'kos_id');
    }
}
