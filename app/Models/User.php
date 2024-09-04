<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable implements MustVerifyEmailContract
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'role',
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];

   protected $casts = [
    'email_verified_at' => 'datetime',
   ];

   public function beritas()
   {
    return $this->hasMany(Berita::class);
   }
}