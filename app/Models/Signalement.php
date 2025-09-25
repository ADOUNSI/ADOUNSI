<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Signalement extends Model
{
    protected $table = 'signalements';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id','auteur_id', 'cible_id', 'trajet_id', 'moderateur_id',
        'motif', 'description', 'date_signalement',
        'statut', 'action', 'date_traitement'
    ];

    protected $casts = [
        'date_signalement' => 'datetime',
        'date_traitement' => 'datetime',
    ];

    // 🔗 Relation vers l’auteur du signalement
    public function auteur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'auteur_id');
    }

    // 🔗 Relation vers la personne signalée
    public function cible(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'cible_id');
    }

    // 🔗 Relation vers le modérateur/admin qui traite
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'admin_id');
    }

    // 🔗 Relation vers le trajet concerné (optionnelle)
    public function trajet(): BelongsTo
    {
        return $this->belongsTo(Trajet::class, 'trajet_id');
    }
}
