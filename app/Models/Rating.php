<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','kos_id','user_id'
    ];

    public function kos()
    {
        return $this->belongsTo(Kos::class ,' kos_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class ,' user_id');
    }
}
