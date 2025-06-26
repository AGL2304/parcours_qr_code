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
    ];

    public function parcours()
    {
        return $this->belongsToMany(Parcours::class, 'etape_parcours')->withPivot('ordre');
    }
}
