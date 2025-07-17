<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcours;
use App\Models\Site;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
     * Display the specified parcours for public access (without authentication).
     */
    public function showPublic(Parcours $parcour)
    {
        // Charger les sites associés au parcours, triés par ordre
        $parcour->load([
            'user',
            'sites' => fn($q) => $q->orderBy('etape_parcours.ordre')
        ]);

        // Optionnel : Vérifiez si le parcours est public si vous avez un champ is_public
        // if (!$parcour->is_public) {
        //     abort(404, 'Ce parcours n\'est pas accessible publiquement.');
        // }

        return view('parcours.public', ['parcours' => $parcour]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parcours $parcour)
{
    // Vérifier que l'utilisateur est propriétaire du parcours
    if ($parcour->user_id !== auth()->id()) {
        abort(403, 'Accès non autorisé.');
    }

    // Charger seulement les sites de l'utilisateur
    $sites = Site::where('user_id', auth()->id())->get();

    // Changement ici : utiliser 'parcours' au lieu de 'parcour'
    return view('parcours.edit', compact('sites'), ['parcours' => $parcour]);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parcours $parcour)
    {
        // Vérifier que l'utilisateur est propriétaire du parcours
        if ($parcour->user_id !== auth()->id()) {
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

        $parcour->update([
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
        $parcour->sites()->sync($sitePivotData);

        return redirect()->route('parcours.show', $parcour)->with('success', 'Parcours mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parcours $parcour)
    {
        // Vérifier que l'utilisateur est propriétaire du parcours
        if ($parcour->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé.');
        }

        try {
            $parcour->delete();
            return redirect()->route('parcours.index')->with('success', 'Parcours supprimé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Une erreur est survenue lors de la suppression du parcours.');
        }
    }

    /**
     * Generate and download QR code for the specified parcours.
     */
    public function downloadQrCode(Parcours $parcour)
    {
        // Vérifier que l'utilisateur est propriétaire du parcours
        if ($parcour->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé.');
        }

        // Générer l'URL publique du parcours pour le QR code
        $publicUrl = route('parcours.public', $parcour);

        $qrCode = QrCode::format('png')
            ->size(300)
            ->margin(2)
            ->errorCorrection('M')
            ->generate($publicUrl);

        $filename = 'qr-code-parcours-' . $parcour->id . '.png';

        return response($qrCode)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

    /**
     * Show QR code for the specified parcours.
     */
    public function showQrCode(Parcours $parcour)
    {
        // Vérifier que l'utilisateur est propriétaire du parcours
        if ($parcour->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé.');
        }

        // Générer l'URL publique du parcours pour le QR code
        $publicUrl = route('parcours.public', $parcour);

        $qrCode = QrCode::format('svg')
            ->size(200)
            ->margin(2)
            ->errorCorrection('M')
            ->generate($publicUrl);

        return view('parcours.qrcode', ['parcours' => $parcour, 'qrCode' => $qrCode]);
    }

    public function __construct()
    {
        $this->middleware('auth')->except(['showPublic']);
    }
}