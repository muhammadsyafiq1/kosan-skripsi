<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambar_kamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'kamar_id','gambar','keterangan'
    ];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'kamar_id');
    }
}
