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
        return $this->belongsToMany('App\Models\Fasilitas');
    }

    public function gallery()
    {
        return $this->hasMany(Gambar_kos::class, 'kos_id');
    }

    public function kamar()
    {
        return $this->hasMany(Kamar::class, 'kos_id');
    }

    public function kosTersimpan()
    {
        return $this->hasMany(Kos_tersimpan::class, 'kos_id');
    }

    
}
