<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Chat;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   // Voir tous les chats
    public function index()
    {
        //
     return response()->json(Chat::with(['conducteur', 'passager', 'messages'])->get());
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

   // Créer un nouveau chat
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'conducteur_id' => 'required|uuid|exists:utilisateurs,id',
            'passager_id' => 'required|uuid|exists:utilisateurs,id',
            'dernier_message_id' => 'nullable|uuid',
            'statut' => 'in:actif,archivé,bloqué',
            'nombre_messages' => 'integer|min:0',
            'dernier_acces_conducteur' => 'nullable|date',
            'dernier_acces_passager' => 'nullable|date'
        ]);

        $validated['id'] = (string) Str::uuid();
        $validated['date_creation'] = now();

        $chat = Chat::create($validated);

        return response()->json($chat, 201);
    }

    /**
     * Display the specified resource.
     */
    // Voir un chat spécifique
    public function show(string $id)
    {
        //
       $chat = Chat::with(['conducteur', 'passager', 'messages'])->findOrFail($id);
        return response()->json($chat);
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
   //Mettre à jour un chat
    public function update(Request $request, string $id)
    {
        //
        $chat = Chat::findOrFail($id);

        $validated = $request->validate([
            'conducteur_id' => 'sometimes|uuid|exists:utilisateurs,id',
            'passager_id' => 'sometimes|uuid|exists:utilisateurs,id',
            'dernier_message_id' => 'nullable|uuid',
            'statut' => 'sometimes|in:actif,archivé,bloqué',
            'nombre_messages' => 'sometimes|integer|min:0',
            'dernier_acces_conducteur' => 'nullable|date',
            'dernier_acces_passager' => 'nullable|date'
        ]);

        $chat->update($validated);

        return response()->json($chat);
    }

    /**
     * Remove the specified resource from storage.
     */
   // Supprimer un chat
    public function destroy(string $id)
    {
        //
        $chat = Chat::findOrFail($id);
        $chat->delete();

        return response()->json(['message' => 'Chat supprimé avec succès']);
    }
}
