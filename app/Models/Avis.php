<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Avis extends Model
{
    protected $table = 'avis';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id','auteur_id', 'cible_id', 'reservation_id', 'trajet_id',
        'note', 'commentaire', 'date_avis', 'type',
        'est_modere', 'motif_moderation'
    ];

    protected $casts = [
        'note' => 'integer',
        'est_modere' => 'boolean',
        'date_avis' => 'datetime',
    ];

    // 🔗 Relation vers l’auteur de l’avis
    public function auteur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'auteur_id');
    }

    // 🔗 Relation vers la personne évaluée
    public function cible(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'cible_id');
    }

    // 🔗 Relation vers la réservation concernée (optionnelle)
    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }

    // 🔗 Relation vers le trajet concerné (optionnelle)
    public function trajet(): BelongsTo
    {
        return $this->belongsTo(Trajet::class, 'trajet_id');
    }
}
