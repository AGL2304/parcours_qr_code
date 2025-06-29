<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcours;
use App\Models\Site;

class ParcoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Afficher seulement les parcours de l'utilisateur connecté
        $parcours = Parcours::where('user_id', auth()->id())
            ->with('user')
            ->latest()
            ->get();
        return view('parcours.index', compact('parcours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Afficher seulement les sites de l'utilisateur connecté
        $sites = Site::where('user_id', auth()->id())->get();
        return view('parcours.create', compact('sites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sites' => 'required|array|min:3',
            'sites.*.id' => 'required|exists:sites,id',
            'sites.*.ordre' => 'required|integer|min:1',
        ]);

        // Vérification supplémentaire : s'assurer que tous les sites sélectionnés appartiennent à l'utilisateur
        $siteIds = collect($request->sites)->pluck('id');
        $userSites = Site::where('user_id', auth()->id())
            ->whereIn('id', $siteIds)
            ->pluck('id');

        if ($siteIds->count() !== $userSites->count()) {
            return redirect()->back()->withErrors('Vous ne pouvez utiliser que vos propres sites.');
        }

        $parcours = Parcours::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        // Construction du tableau pour sync()
        $sitePivotData = [];

        foreach ($request->sites as $siteData) {
            $siteId = $siteData['id'];
            $ordre = $siteData['ordre'];

            if (!empty($siteId) && !empty($ordre)) {
                $sitePivotData[$siteId] = [
                    'ordre' => $ordre,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Liaison avec les sites
        $parcours->sites()->sync($sitePivotData);

        return redirect()->route('parcours.show', $parcours)->with('success', 'Parcours créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Parcours $parcour)
    {
        // Vérifier que l'utilisateur est propriétaire du parcours
        if ($parcour->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé.');
        }

        $parcour->load([
            'user',
            'sites' => fn($q) => $q->orderBy('etape_parcours.ordre')
        ]);

        return view('parcours.show', ['parcours' => $parcour]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parcours $parcours)
    {
        // Vérifier que l'utilisateur est propriétaire du parcours
        if ($parcours->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé.');
        }

        // Charger seulement les sites de l'utilisateur
        $sites = Site::where('user_id', auth()->id())->get();

        return view('parcours.edit', compact('parcours', 'sites'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parcours $parcours)
    {
        // Vérifier que l'utilisateur est propriétaire du parcours
        if ($parcours->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé.');
        }

        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sites' => 'required|array|min:3',
            'sites.*.id' => 'required|exists:sites,id',
            'sites.*.ordre' => 'required|integer|min:1',
        ]);

        // Vérification supplémentaire : s'assurer que tous les sites sélectionnés appartiennent à l'utilisateur
        $siteIds = collect($request->sites)->pluck('id');
        $userSites = Site::where('user_id', auth()->id())
            ->whereIn('id', $siteIds)
            ->pluck('id');

        if ($siteIds->count() !== $userSites->count()) {
            return redirect()->back()->withErrors('Vous ne pouvez utiliser que vos propres sites.');
        }

        $parcours->update([
            'nom' => $request->nom,
            'description' => $request->description,
        ]);

        // Construction du tableau pour sync()
        $sitePivotData = [];

        foreach ($request->sites as $siteData) {
            $siteId = $siteData['id'];
            $ordre = $siteData['ordre'];

            if (!empty($siteId) && !empty($ordre)) {
                $sitePivotData[$siteId] = [
                    'ordre' => $ordre,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Liaison avec les sites
        $parcours->sites()->sync($sitePivotData);

        return redirect()->route('parcours.show', $parcours)->with('success', 'Parcours mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parcours $parcours)
    {
        // Vérifier que l'utilisateur est propriétaire du parcours
        if ($parcours->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé.');
        }

        try {
            $parcours->delete();
            return redirect()->route('parcours.index')->with('success', 'Parcours supprimé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Une erreur est survenue lors de la suppression du parcours.');
        }
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}