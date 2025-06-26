<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcours extends Model 
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'user_id'];

    public function sites()
    {
        return $this->belongsToMany(Site::class, 'etape_parcours')
                    ->withPivot('ordre')
                    ->withTimestamps()
                    ->orderBy('ordre');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
