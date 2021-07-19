<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','bank_id','bukti_bayar','status','mulai_sewa','habis_sewa'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bank()
    {
        return $this->belongsTo(User::class, 'bank_id');
    }

    public function bookingdetail()
    {
        return $this->hasMany(Booking_detail::class, 'booking_id');
    }
}
