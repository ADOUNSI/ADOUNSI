<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Vehicule;
class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Voir tous les véhicules
    public function index()
    {
        //
     return response()->json(Vehicule::with('conducteur')->get());
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
    //Créer un nouveau véhicule
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'type' => 'nullable|string',
            'marque' => 'required|string',
            'modele' => 'required|string',
            'couleur' => 'nullable|string',
            'immatriculation' => 'required|string|unique:vehicules,immatriculation',
            'places_disponibles' => 'nullable|integer|min:1',
            'carte_grise' => 'nullable|string',
            'est_verifie' => 'boolean',
            'photo_vehicule' => 'nullable|string',
            'conducteur_id' => 'required|uuid|exists:utilisateurs,id'
        ]);

        $validated['id'] = (string) Str::uuid();
        $validated['date_ajout'] = now();

        $vehicule = Vehicule::create($validated);

        return response()->json($vehicule, 201);
    }

    /**
     * Display the specified resource.
     */
   // Voir un véhicule spécifique
    public function show(string $id)
    {
        //
        $vehicule = Vehicule::with('conducteur')->findOrFail($id);
        return response()->json($vehicule);
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
    // Mettre à jour un véhicule
    public function update(Request $request, string $id)
    {
        //
        $vehicule = Vehicule::findOrFail($id);

        $validated = $request->validate([
            'type' => 'sometimes|string',
            'marque' => 'sometimes|string',
            'modele' => 'sometimes|string',
            'couleur' => 'nullable|string',
            'immatriculation' => 'sometimes|string|unique:vehicules,immatriculation,' . $id,
            'places_disponibles' => 'nullable|integer|min:1',
            'carte_grise' => 'nullable|string',
            'est_verifie' => 'boolean',
            'photo_vehicule' => 'nullable|string',
            'conducteur_id' => 'sometimes|uuid|exists:utilisateurs,id'
        ]);

        $vehicule->update($validated);

        return response()->json($vehicule);
    }

    /**
     * Remove the specified resource from storage.
     */
   // Supprimer un véhicule
    public function destroy(string $id)
    {
        //
        $vehicule = Vehicule::findOrFail($id);
        $vehicule->delete();

        return response()->json(['message' => 'Véhicule supprimé avec succès']);
    }
}
