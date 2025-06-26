<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcours;

class PublicController extends Controller
{
    public function showParcours()
    {
        return view('public.parcours'); // vue à créer
    }

    public function listeParcours()
{
    $parcours = Parcours::all(); // Récupère tous les parcours
    return view('public.liste_parcours', compact('parcours'));
}
}

