<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Reservation;
use App\Models\Trajet;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  // Voir toutes les réservations
    public function index()
    {
        //
     return response()->json(Reservation::with(['passager', 'trajet'])->get());
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
   // Créer une nouvelle réservation
    public function store(Request $request)
    {
        //

        $validated = $request->validate([
            'passager_id' => 'required|uuid|exists:utilisateurs,id',
            'trajet_id' => 'required|uuid|exists:trajets,id',
            'places_demandees' => 'required|integer|min:1',
            'mode_paiement' => 'nullable|in:espèces,mobile_money,carte',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric'
        ]);

        $trajet =\App\Models\Trajet::findOrFail($validated['trajet_id']);

        //  Règle métier : ne pas dépasser les places disponibles
        if (!is_numeric($trajet->places_disponibles) || $trajet->places_disponibles < $validated['places_demandees']) {
        return response()->json(['error' => 'Pas assez de places disponibles'], 422);
        }


        //  Calcul du montant
        $validated['montant'] = $trajet->prix_par_place * $validated['places_demandees'];
        $validated['id'] = (string) Str::uuid();
        $validated['statut'] = 'en_attente';

        $reservation = Reservation::create($validated);


       return response()->json([
       'places_demandees' => $validated['places_demandees'],
       'places_disponibles_lues' => $trajet->places_disponibles,
       'type_lu' => gettype($trajet->places_disponibles)
       ]);



      }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $reservation = Reservation::with(['passager', 'trajet'])->findOrFail($id);
        return response()->json($reservation);
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
    // Mettre à jour une réservation
    public function update(Request $request, string $id)
    {
        //
$reservation = Reservation::findOrFail($id);

        $validated = $request->validate([
            'places_demandees' => 'sometimes|integer|min:1',
            'statut' => 'in:en_attente,confirmée,annulée',
            'mode_paiement' => 'nullable|in:espèces,mobile_money,carte',
            'motif_annulation' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric'
        ]);

        //  Recalcul du montant si places modifiées
        if (isset($validated['places_demandees'])) {
            $trajet = Trajet::findOrFail($reservation->trajet_id);
            if ($validated['places_demandees'] > $trajet->places_disponibles) {
                return response()->json(['error' => 'Pas assez de places disponibles'], 422);
            }
            $validated['montant'] = $trajet->prix_par_place * $validated['places_demandees'];
        }

        //  Suivi de statut
        if (isset($validated['statut'])) {
            if ($validated['statut'] === 'confirmée') {
                $validated['date_confirmation'] = now();
            }
            if ($validated['statut'] === 'annulée') {
                $validated['date_annulation'] = now();
            }
        }

        $reservation->update($validated);

        return response()->json($reservation);
    }

    /**
     * Remove the specified resource from storage.
     */
    // Supprimer une réservation
    public function destroy(string $id)
    {
        //
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return response()->json(['message' => 'Réservation supprimée avec succès']);
    }
}
