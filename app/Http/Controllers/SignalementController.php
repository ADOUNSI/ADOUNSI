<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Signalement;

class SignalementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Voir tous les signalements
    public function index()
    {
        //
     return response()->json(Signalement::all());
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
   // Créer un nouveau signalement
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'type' => 'required|string',
            'contenu' => 'required|string',
            'source_id' => 'required|uuid',
            'source_type' => 'required|string',
            'auteur_id' => 'required|uuid',
            'cible_id' => 'required|uuid',
            'description' => 'required|string',
            'motif' => 'required|string'
        ]);

        $validated['id'] = (string) Str::uuid();
        $signalement = Signalement::create($validated);


       return response()->json($validated);

    }

    /**
     * Display the specified resource.
     */
   //  Voir un signalement spécifique
    public function show(string $id)
    {
        //
        $signalement = Signalement::findOrFail($id);
        return response()->json($signalement);
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

    //  Mettre à jour un signalement
    public function update(Request $request, string $id)
    {
        //
        $signalement = Signalement::findOrFail($id);

        $validated = $request->validate([
          'type' => 'sometimes|string',
          'contenu' => 'sometimes|string',
          'motif' => 'sometimes|string',
          'description' => 'sometimes|string',
          'auteur_id' => 'sometimes|uuid',
          'cible_id' => 'sometimes|uuid',
          'admin_id' => 'sometimes|uuid',
          'moderateur_id' => 'nullable|uuid',
          'trajet_id' => 'sometimes|uuid',
          'date_signalement' => 'sometimes|date',
          'statut' => 'sometimes|string',
          'action' => 'sometimes|string',
          'date_traitement' => 'nullable|date'
       ]);


        $signalement->update($validated);
        return response()->json($signalement);
    }

    /**
     * Remove the specified resource from storage.
     */
//  Supprimer un signalement
    public function destroy(string $id)
    {
        //
       $signalement = Signalement::findOrFail($id);
        $signalement->delete();

        return response()->json(['message' => 'Signalement supprimé avec succès']);
    }
}
