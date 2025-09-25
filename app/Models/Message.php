<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    protected $table = 'messages';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'chat_id', 'expediteur_id', 'contenu',
        'date_envoi', 'statut', 'type'
    ];

    protected $casts = [
        'date_envoi' => 'datetime',
    ];

    // 🔗 Relation vers le chat
    public function chat(): BelongsTo
    {
        return $this->belongsTo(Chat::class, 'chat_id');
    }

    // 🔗 Relation vers l’expéditeur
    public function expediteur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'expediteur_id');
    }
}
