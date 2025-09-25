<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Avis;

class AvisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   // Voir tous les avis
    public function index()
    {
        //
     return response()->json(Avis::with(['auteur', 'cible', 'reservation', 'trajet'])->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
     //  Créer un nouvel avis
    public function store(Request $request)
    {
        //
       $validated = $request->validate([
            'auteur_id' => 'required|uuid|exists:utilisateurs,id',
            'cible_id' => 'required|uuid|exists:utilisateurs,id',
            'reservation_id' => 'nullable|uuid|exists:reservations,id',
            'trajet_id' => 'nullable|uuid|exists:trajets,id',
            'note' => 'required|integer|min:1|max:5',
            'commentaire' => 'required|string',
            'type' => 'in:conducteur,passager',
            'est_modere' => 'boolean',
            'motif_moderation' => 'nullable|string'
        ]);

        $validated['id'] = (string) Str::uuid();
        $validated['date_avis'] = now();

        $avis = Avis::create($validated);

        return response()->json($avis, 201);

    }

    /**
     * Display the specified resource.
     */
    //Voir un avis spécifique
    public function show(string $id)
    {
        //
        $avis = Avis::with(['auteur', 'cible', 'reservation', 'trajet'])->findOrFail($id);
        return response()->json($avis);
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
    // Mettre à jour un avis
    public function update(Request $request, string $id)
    {
        //
       $avis = Avis::findOrFail($id);

        $validated = $request->validate([
            'auteur_id' => 'sometimes|uuid|exists:utilisateurs,id',
            'cible_id' => 'sometimes|uuid|exists:utilisateurs,id',
            'reservation_id' => 'nullable|uuid|exists:reservations,id',
            'trajet_id' => 'nullable|uuid|exists:trajets,id',
            'note' => 'sometimes|integer|min:1|max:5',
            'commentaire' => 'sometimes|string',
            'type' => 'sometimes|in:conducteur,passager',
            'est_modere' => 'boolean',
            'motif_moderation' => 'nullable|string'
        ]);

        $avis->update($validated);

        return response()->json($avis);
    }

    /**
     * Remove the specified resource from storage.
     */
   //Supprimer un avis
    public function destroy(string $id)
    {
        //
        $avis = Avis::findOrFail($id);
        $avis->delete();

        return response()->json(['message' => 'Avis supprimé avec succès']);
    }
}
