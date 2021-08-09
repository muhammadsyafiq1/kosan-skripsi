<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','nama_kos','latitude','longitude','alamat','type_kos','aturan_kos','deskripsi_kos','luas_kos','status','slug','is_booking','biaya_booking'
    ];

    public function codespacephoto()
    {
    	return $this->hasMany(CodespacePhoto::class,'kos_id','id');
    }

    public function getKos($latitude, $longitude, $radius)
    {
        return $this->select('kos.*')
            ->selectRaw(
                '( 6371 *
                    acos( cos( radians(?) ) *
                        cos( radians( latitude ) ) *
                        cos( radians(longitude ) - radians(?)) +
                        sin( radians(?) ) *
                        sin( radians( latitude ) )
                    )
                ) AS distance', [$latitude, $longitude, $latitude]
            )
            ->havingRaw("distance < ?", [$radius])
            ->orderBy('distance', 'asc');            
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function fasilitas()
    {
        return $this->belongsToMany('App\Models\Fasilitas');
    }

    public function testimonial()
    {
        return $this->hasMany(Testimonial::class, 'kos_id');
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
