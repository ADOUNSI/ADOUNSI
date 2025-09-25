<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    protected $table = 'reservations';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'date_reservation', 'passager_id', 'trajet_id',
        'places_demandees', 'statut', 'mode_paiement', 'montant',
        'date_confirmation', 'date_annulation', 'motif_annulation',
        'latitude', 'longitude'
    ];

    protected $casts = [
        'date_reservation' => 'datetime',
        'date_confirmation' => 'datetime',
        'date_annulation' => 'datetime',
        'latitude' => 'float',
        'longitude' => 'float',
        'montant' => 'float',
    ];

    // 🔗 Relation vers le passager (Utilisateur)
    public function passager(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'passager_id');
    }

    // 🔗 Relation vers le trajet réservé
    public function trajet(): BelongsTo
    {
        return $this->belongsTo(Trajet::class, 'trajet_id');
    }
}
