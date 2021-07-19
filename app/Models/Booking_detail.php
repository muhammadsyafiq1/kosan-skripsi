<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id','kos_id','kamar_id','total_bayar','lama_sewa'
    ];

    public function booking()
    {
        return $this->hasOne(Booking::class , 'id' , 'booking_id');
    }

    public function kos()
    {
        return $this->hasOne(Kos::class , 'id' , 'kos_id');
    }

    public function kamar()
    {
        return $this->hasOne(Kamar::class , 'id' , 'kamar_id');
    }
}
