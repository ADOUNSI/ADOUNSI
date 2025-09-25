<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicule extends Model
{
    protected $table = 'vehicules';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'type', 'marque', 'modele', 'couleur', 'immatriculation',
        'places_disponibles', 'carte_grise', 'est_verifie',
        'photo_vehicule', 'date_ajout', 'conducteur_id'
    ];

    protected $casts = [
        'est_verifie' => 'boolean',
        'date_ajout' => 'datetime',
    ];

    // 🔗 Relation inverse vers Utilisateur
    public function conducteur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'conducteur_id');
    }
}
