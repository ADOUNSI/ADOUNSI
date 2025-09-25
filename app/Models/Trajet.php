<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trajet extends Model
{
    protected $table = 'trajets';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id','ville_depart', 'ville_arrivee', 'date_trajet', 'heure_depart',
        'places_disponibles', 'prix_par_place', 'statut',
        'latitude', 'longitude', 'conducteur_id', 'vehicule_id'
    ];

    protected $casts = [
        'date_trajet' => 'date',
        'heure_depart' => 'datetime:H:i',
        'latitude' => 'float',
        'longitude' => 'float',
        'prix_par_place' => 'float',
    ];

    // 🔗 Relation vers le conducteur (Utilisateur)
    public function conducteur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'conducteur_id');
    }

    // 🔗 Relation vers le véhicule utilisé
    public function vehicule(): BelongsTo
    {
        return $this->belongsTo(Vehicule::class, 'vehicule_id');
    }

    // 🔗 Réservations liées à ce trajet
public function reservations(): HasMany
{
    return $this->hasMany(Reservation::class);
}

}
