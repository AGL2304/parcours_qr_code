<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Ajoutez cette ligne
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory; // Ajoutez cette ligne
    
    public function parcours()
    {
        return $this->belongsToMany(Parcours::class, 'etape_parcours')->withPivot('ordre');
    }
}