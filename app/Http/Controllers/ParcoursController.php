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
        $parcours = Parcours::with('user')->latest()->get();
        return view('parcours.index', compact('parcours'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sites = Site::all();
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

        $parcours = Parcours::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        foreach ($request->sites as $siteData) {
            if (!empty($siteData['id']) && !empty($siteData['ordre'])) {
                $parcours->sites()->attach($siteData['id'], ['ordre' => $siteData['ordre']]);
            }
        }

        return redirect()->route('parcours.show', $parcours)->with('success', 'Parcours créé avec succès.');
    }





    /**
     * Display the specified resource.
     */
    // public function show(Parcours $parcours)
    // {
    //     return view('parcours.show', compact('parcours'));


    // }
    public function show(Parcours $parcours)
    {
        $parcours->load(['user', 'sites' => fn($q) => $q->orderBy('etape_parcours.ordre')]);
        return view('parcours.show', compact('parcours'));

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
