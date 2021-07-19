<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_rek','nama_nasabah','nama_bank','user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
