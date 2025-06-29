<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'latitude',
        'longitude',
        'image',
        'user_id', // Ajout du user_id
    ];

    public function parcours()
    {
        return $this->belongsToMany(Parcours::class, 'etape_parcours')->withPivot('ordre');
    }

    /**
     * Relation avec l'utilisateur propriétaire du site
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}