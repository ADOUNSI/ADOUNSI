<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Paiement extends Model
{
    protected $table = 'paiements';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'montant', 'commission', 'mode_paiement', 'statut',
        'date_transaction', 'reference_externe', 'est_remboursee',
        'motif_remboursement', 'reservation_id', 'payeur_id', 'beneficiaire_id'
    ];

    protected $casts = [
        'montant' => 'float',
        'commission' => 'float',
        'est_remboursee' => 'boolean',
        'date_transaction' => 'datetime',
    ];

    // 🔗 Relation vers le payeur
    public function payeur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'payeur_id');
    }

    // 🔗 Relation vers le bénéficiaire
    public function beneficiaire(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'beneficiaire_id');
    }

    // 🔗 Relation vers la réservation (optionnelle)
    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }
}
