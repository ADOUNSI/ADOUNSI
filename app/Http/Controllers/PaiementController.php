<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Paiement;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Voir tous les paiements
    public function index()
    {
        //
     return response()->json(Paiement::with('reservation')->get());
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
   // Créer un nouveau paiement
    public function store(Request $request)
    {
        //
       $validated = $request->validate([
            'reservation_id' => 'required|uuid|exists:reservations,id',
            'montant' => 'required|numeric|min:0',
            'mode' => 'required|in:espèces,mobile_money,carte',
            'statut' => 'in:en_attente,effectué,échoué, remboursé',
            'preuve' => 'nullable|string',
            'date_paiement' => 'nullable|date',
            'beneficiaire_id' => 'required|uuid|exists:utilisateurs,id',
            'payeur_id' => 'required|uuid|exists:utilisateurs,id'
        ]);

        $validated['id'] = (string) Str::uuid();
        $validated['statut'] = $validated['statut'] ?? 'en_attente';
        $validated['date_paiement'] = $validated['date_paiement'] ?? now();

        $paiement = Paiement::create($validated);



      return response()->json($validated);


    }

    /**
     * Display the specified resource.
     */
    // Voir un paiement spécifique
    public function show(string $id)
    {
        //
        $paiement = Paiement::with('reservation')->findOrFail($id);
        return response()->json($paiement);
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
   //  Mettre à jour un paiement
    public function update(Request $request, string $id)
    {
        //
       $paiement = Paiement::findOrFail($id);

        $validated = $request->validate([
            'montant' => 'sometimes|numeric|min:0',
            'mode' => 'sometimes|in:espèces,mobile_money,carte',
            'statut' => 'sometimes|in:en_attente,effectué,échoué, remboursé',
            'preuve' => 'nullable|string',
            'date_paiement' => 'nullable|date'

        ]);

        $paiement->update($validated);

        return response()->json($paiement);
    }

    /**
     * Remove the specified resource from storage.
     */
    // Supprimer un paiement
    public function destroy(string $id)
    {
        //
        $paiement = Paiement::findOrFail($id);
        $paiement->delete();

        return response()->json(['message' => 'Paiement supprimé avec succès']);
    }
}
