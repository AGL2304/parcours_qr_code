<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
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

    /**
     * Relation avec les parcours créés par l'utilisateur
     */
    public function parcours()
    {
        return $this->hasMany(Parcours::class);
    }

    /**
     * Relation avec les sites créés par l'utilisateur
     */
    public function sites()
    {
        return $this->hasMany(Site::class);
    }
}