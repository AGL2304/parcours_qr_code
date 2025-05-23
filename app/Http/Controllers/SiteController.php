<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcours;
use App\Models\Site;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sites = Site::all(); // Récupération de tous les sites
        return view('site.index', compact('sites'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sites = Site::all();
        return view('site.create', compact('sites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sites' => 'required|array',
            'sites.*.id' => 'required|exists:sites,id',
            'sites.*.ordre' => 'required|integer|min:1',
        ]);

        try {
            DB::beginTransaction();

            $parcours = Parcours::create([
                'nom' => $request->nom,
                'description' => $request->description,
                'user_id' => auth()->id(),
            ]);

            $sites = collect($request->sites)
                ->mapWithKeys(fn($site) => [$site['id'] => ['ordre' => $site['ordre']]]);

            $parcours->sites()->attach($sites);

            DB::commit();
            return redirect()->route('parcours.show', $parcours)->with('success', 'Parcours créé avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Une erreur est survenue lors de la création du parcours.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Parcours $parcours)
    {
        $parcours->load(['user', 'sites' => fn($q) => $q->orderBy('etape_parcours.ordre')]);
        return view('parcours.show', compact('parcours'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parcours $parcours)
    {
        $sites = Site::all();
        $parcours->load('sites');
        return view('site.edit', compact('parcours', 'sites'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parcours $parcours)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sites' => 'required|array',
            'sites.*.id' => 'required|exists:sites,id',
            'sites.*.ordre' => 'required|integer|min:1',
        ]);

        try {
            DB::beginTransaction();

            $parcours->update([
                'nom' => $request->nom,
                'description' => $request->description,
            ]);

            $sites = collect($request->sites)
                ->mapWithKeys(fn($site) => [$site['id'] => ['ordre' => $site['ordre']]]);

            $parcours->sites()->sync($sites);

            DB::commit();
            return redirect()->route('parcours.show', $parcours)->with('success', 'Parcours mis à jour avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Une erreur est survenue lors de la mise à jour du parcours.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parcours $parcours)
    {
        try {
            $parcours->delete();
            return redirect()->route('site.index')->with('success', 'Parcours supprimé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Une erreur est survenue lors de la suppression du parcours.');
        }
    }
}
