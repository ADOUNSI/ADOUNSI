<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trajets', function (Blueprint $table) {
   $table->uuid('id')->primary()->default(DB::raw('(UUID())'));


    // Informations de base
    $table->string('ville_depart');
    $table->string('ville_arrivee');
    $table->date('date_trajet')->nullable();

    $table->time('heure_depart')->nullable();

    $table->integer('places_disponibles')->nullable();
    $table->integer('prix_par_place')->nullable();

    // Statut du trajet
    $table->enum('statut', ['en_attente', 'confirmé', 'complet', 'annulé'])->default('en_attente');

    // Position actuelle du conducteur (optionnelle)
    $table->float('latitude')->nullable();
    $table->float('longitude')->nullable();

    // Relations
    $table->uuid('conducteur_id'); // foreign key vers utilisateurs

    $table->uuid('vehicule_id')->nullable();// foreign key vers vehicules


    $table->timestamps();

    // Clés étrangères
    $table->foreign('conducteur_id')->references('id')->on('utilisateurs')->onDelete('cascade');
    $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trajets');
    }
};
