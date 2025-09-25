<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   // Voir tous les messages
    public function index()
    {
        //
      return response()->json(Message::with(['chat', 'expediteur'])->get());
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
   //  Créer un nouveau message
    public function store(Request $request)
    {
        //

        $validated = $request->validate([
            'chat_id' => 'nullable|uuid',
            'expediteur_id' => 'required|uuid|exists:utilisateurs,id',
            'contenu' => 'required|string',
            'statut' => 'in:lu,non_lu,supprimé',
            'type' => 'in:texte,image,lien,alerte'
        ]);

        $validated['id'] = (string) Str::uuid();
        $validated['date_envoi'] = now();

        $message = Message::create($validated);
      return response()->json($message, 201);


    }


    /**
     * Display the specified resource.
     */
    // Voir un message spécifique
    public function show(string $id)
    {
        //
        $message = Message::with(['chat', 'expediteur'])->findOrFail($id);
        return response()->json($message);
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
   // Mettre à jour un message
    public function update(Request $request, string $id)
    {
        //
        $message = Message::findOrFail($id);

        $validated = $request->validate([
            'chat_id' => 'nullable|uuid',
            'expediteur_id' => 'sometimes|uuid|exists:utilisateurs,id',
            'contenu' => 'sometimes|string',
            'statut' => 'sometimes|in:lu,non_lu,supprimé',
            'type' => 'sometimes|in:texte,image,lien,alerte'
        ]);

        $message->update($validated);

        return response()->json($message);
    }

    /**
     * Remove the specified resource from storage.
     */
   //Supprimer un message
    public function destroy(string $id)
    {
        //
        $message = Message::findOrFail($id);
        $message->delete();

        return response()->json(['message' => 'Message supprimé avec succès']);
    }
}

