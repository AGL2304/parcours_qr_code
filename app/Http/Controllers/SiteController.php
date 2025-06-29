<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Afficher seulement les sites de l'utilisateur connecté
        $sites = Site::where('user_id', auth()->id())->get();
        return view('sites.index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sites.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $imagePath = null;

            // Gestion de l'upload d'image
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('sites', 'public');
            }

            Site::create([
                'nom' => $request->nom,
                'description' => $request->description,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'image' => $imagePath,
                'user_id' => auth()->id(), // Associer le site à l'utilisateur connecté
            ]);

            return redirect()->route('sites.index')->with('success', 'Site créé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Site $site)
    {
        // Vérifier que l'utilisateur est propriétaire du site
        if ($site->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé.');
        }

        return view('sites.show', compact('site'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Site $site)
    {
        // Vérifier que l'utilisateur est propriétaire du site
        if ($site->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé.');
        }

        return view('sites.edit', compact('site'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Site $site)
    {
        // Vérifier que l'utilisateur est propriétaire du site
        if ($site->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé.');
        }

        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $imagePath = $site->image; // Conserver l'ancienne image par défaut

            // Gestion de l'upload d'une nouvelle image
            if ($request->hasFile('image')) {
                // Supprimer l'ancienne image si elle existe
                if ($site->image && Storage::disk('public')->exists($site->image)) {
                    Storage::disk('public')->delete($site->image);
                }

                // Stocker la nouvelle image
                $imagePath = $request->file('image')->store('sites', 'public');
            }

            $site->update([
                'nom' => $request->nom,
                'description' => $request->description,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'image' => $imagePath,
            ]);

            return redirect()->route('sites.show', $site)->with('success', 'Site mis à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Une erreur est survenue lors de la mise à jour du site.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site)
    {
        // Vérifier que l'utilisateur est propriétaire du site
        if ($site->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé.');
        }

        try {
            // Supprimer l'image associée si elle existe
            if ($site->image && Storage::disk('public')->exists($site->image)) {
                Storage::disk('public')->delete($site->image);
            }

            $site->delete();
            return redirect()->route('sites.index')->with('success', 'Site supprimé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Une erreur est survenue lors de la suppression du site.');
        }
    }


    public function __construct()
    {
        $this->middleware('auth');
    }
}