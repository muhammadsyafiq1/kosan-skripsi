<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','nama_kos','latitude','longitude','alamat','type_kos','aturan_kos','deskripsi_kos','luas_kos','status','slug'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function fasilitas()
    {
        return $this->belongsToMany('app\Models\Fasilitas');
    }
}
