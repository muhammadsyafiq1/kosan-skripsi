<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_fasilitas','icon','keterangan'
    ];

    public function kos()
    {
        return $this->belongsToMany('app\Models\Kos');
    }
}
