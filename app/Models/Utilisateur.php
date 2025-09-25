<?php

namespace App\Models;
use Illuminate\Support\Collection;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Utilisateur extends Authenticatable
{
    protected $table = 'utilisateurs';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing =  false;
    protected $fillable = [
        'nom', 'prenom', 'email', 'mot_de_passe', 'telephone',
        'reseaux_sociaux', 'photo_profil', 'role', 'date_inscription',
        'note_moyenne', 'nombre_evaluations', 'moyen_paiement_favori',
        'preferences_trajet', 'cni', 'permis_conduire', 'carte_grise',
        'est_verifie', 'total_gains', 'nombre_trajets', 'position_actuelle',
        'niveau_acces', 'statut_compte', 'droits', 'signalements_traites',
        'actions_effectuees', 'derniere_connexion', 'date_creation'
    ];

    protected $casts = [
        'reseaux_sociaux' => 'array',
        'preferences_trajet' => 'array',
        'droits' => 'array',
        'est_verifie' => 'boolean',
        'position_actuelle' => 'point',
    ];



protected static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        $model->id = (string) \Illuminate\Support\Str::uuid();
    });
}

    // Relations Eloquent

    public function trajets(): HasMany
   {
    return $this->hasMany(Trajet::class, 'conducteur_id');
   }

    public function reservations(): HasMany
    {
    return $this->hasMany(Reservation::class, 'passager_id');
    }
    public function messagesEnvoyes(): HasMany
    {
        return $this->hasMany(Message::class, 'expediteur_id');
    }

    public function messagesRecus(): HasMany
    {
        return $this->hasMany(Message::class, 'destinataire_id');
    }

    public function avisDonnes(): HasMany
    {
        return $this->hasMany(Avis::class, 'auteur_id');
    }

    public function avisRecus(): HasMany
    {
        return $this->hasMany(Avis::class, 'cible_id');
    }

    public function signalementsFaits(): HasMany
    {
        return $this->hasMany(Signalement::class, 'auteur_id');
    }

    public function signalementsRecus(): HasMany
    {
        return $this->hasMany(Signalement::class, 'cible_id');
    }

    public function signalementsTraites(): HasMany
    {
        return $this->hasMany(Signalement::class, 'admin_id');
    }

    public function vehicule(): HasOne
    {
    return $this->hasOne(Vehicule::class, 'conducteur_id');
    }

    public function paiementsEffectues(): HasMany
    {
        return $this->hasMany(Paiement::class, 'payeur_id');
    }

    public function paiementsRecus(): HasMany
    {
        return $this->hasMany(Paiement::class, 'beneficiaire_id');
    }

public function chats(): Collection
{
    return $this->role === 'conducteur'
        ? $this->chatsCommeConducteur
        : $this->chatsCommePassager;
}

}
