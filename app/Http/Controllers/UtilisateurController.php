<?php

namespace App\Http\Controllers;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   // GET /api/utilisateurs
    public function index()
    {
        //
    return Utilisateur::all();
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
   // POST /api/utilisateurs
    public function store(Request $request)
    {
        //
       $data = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:utilisateurs,email',
            'mot_de_passe' => 'required|string|min:6',
            'telephone' => 'nullable|string',
            'reseaux_sociaux' => 'nullable|array',
            'photo_profil' => 'nullable|string',
            'role' => 'required|in:passager,conducteur,admin',
            'moyen_paiement_favori' => 'nullable|array',
            'preferences_trajet' => 'nullable|array',
            'cni' => 'nullable|string',
            'permis_conduire' => 'nullable|string',
            'carte_grise' => 'nullable|string',
            'est_verifie' => 'nullable|boolean',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $data['mot_de_passe'] = bcrypt($data['mot_de_passe']);
        $utilisateur = Utilisateur::create($data);

        return response()->json($utilisateur, 201);
    }

    /**
     * Display the specified resource.
     */
   // GET /api/utilisateurs/{id}
    public function show(string $id)
    {
        //
     return response()->json([
        'id_reçu' => $id,
        'existe_en_base' => Utilisateur::where('id', $id)->exists(),
        'utilisateur' => Utilisateur::where('id', $id)->first()
    ]);
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
    // PUT /api/utilisateurs/{id}
    public function update(Request $request, string $id)
    {
        //

       $utilisateur = Utilisateur::findOrFail($id);

        $data = $request->validate([
            'nom' => 'sometimes|string',
            'prenom' => 'sometimes|string',
            'email' => 'sometimes|email|unique:utilisateurs,email,' . $id,
            'mot_de_passe' => 'sometimes|string|min:6',
            'telephone' => 'sometimes|string',
            'reseaux_sociaux' => 'sometimes|array',
            'photo_profil' => 'sometimes|string',
            'role' => 'sometimes|in:passager,conducteur,admin',
            'moyen_paiement_favori' => 'sometimes|array',
            'preferences_trajet' => 'sometimes|array',
            'cni' => 'sometimes|string',
            'permis_conduire' => 'sometimes|string',
            'carte_grise' => 'sometimes|string',
            'est_verifie' => 'sometimes|boolean',
            'latitude' => 'sometimes|numeric',
            'longitude' => 'sometimes|numeric',
        ]);

        if (isset($data['mot_de_passe'])) {
            $data['mot_de_passe'] = bcrypt($data['mot_de_passe']);
        }

        $utilisateur->update($data);

        return response()->json($utilisateur);
    }

    /**
     * Remove the specified resource from storage.
     */

   // DELETE /api/utilisateurs/{id}
    public function destroy(string $id)
    {
        //
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->delete();

        return response()->json(['message' => 'Utilisateur supprimé']);
    }
}
