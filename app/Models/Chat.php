<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
    protected $table = 'chats';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'conducteur_id', 'passager_id', 'dernier_message_id',
        'date_creation', 'statut', 'nombre_messages',
        'dernier_acces_conducteur', 'dernier_acces_passager'
    ];

    protected $casts = [
        'date_creation' => 'datetime',
        'dernier_acces_conducteur' => 'datetime',
        'dernier_acces_passager' => 'datetime',
    ];

    // 🔗 Relation vers le conducteur
    public function conducteur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'conducteur_id');
    }

    // 🔗 Relation vers le passager
    public function passager(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'passager_id');
    }

    // 🔗 Tous les messages du chat
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}
