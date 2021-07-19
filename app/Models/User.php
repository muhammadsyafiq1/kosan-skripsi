<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'alamat',
        'no_hp',
        'roles'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function kos()
    {
        return $this->hasMany(Kos::class, 'kos_id');
    }

    public function booking()
    {
        return $this->hasMany(Booking::class, 'user_id');
    }

    public function testimonial()
    {
        return $this->hasMany(testimonial::class, 'user_id');
    }

    public function bank()
    {
        return $this->hasMany(Bank::class, 'user_id');
    }
}
