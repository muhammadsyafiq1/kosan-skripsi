<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambar_kos extends Model
{
    use HasFactory;

    protected $fillable = [
        'kos_id','gambar','lokasi','keterangan'
    ];

    public function kos()
    {
        return $this->belongsTo(Kos::class, 'kos_id');
    }
}
