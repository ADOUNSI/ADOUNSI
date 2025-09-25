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
        Schema::create('reservations', function (Blueprint $table) {

    $table->uuid('id')->primary()->default(DB::raw('(UUID())'));// idReservation


    // Informations de base
    $table->timestamp('date_reservation')->useCurrent(); // ✅ Critique
    $table->uuid('passager_id');                          // ✅ Critique
    $table->uuid('trajet_id');                            // ✅ Critique
    $table->integer('places_demandees')->nullable();                  // ✅ Critique
    $table->enum('statut', ['en_attente', 'confirmée', 'annulée'])->default('en_attente'); // ✅ Critique
    $table->enum('mode_paiement', ['espèces', 'mobile_money', 'carte'])->nullable();       // ✅ Optionnel
    $table->float('montant')->default(0);                 // ✅ Critique

    // Suivi de statut
    $table->timestamp('date_confirmation')->nullable();   // ✅ Optionnel
    $table->timestamp('date_annulation')->nullable();     // ✅ Optionnel
    $table->string('motif_annulation')->nullable();       // ✅ Optionnel

    // Position du passager (optionnelle)
    $table->float('latitude')->nullable();                // ✅ Optionnel
    $table->float('longitude')->nullable();               // ✅ Optionnel

    $table->timestamps();

    // Clés étrangères
    $table->foreign('passager_id')->references('id')->on('utilisateurs')->onDelete('cascade');
    $table->foreign('trajet_id')->references('id')->on('trajets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
