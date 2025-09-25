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
        Schema::create('vehicules', function (Blueprint $table) {

   $table->uuid('id')->primary()->default(DB::raw('(UUID())'));// idVehicule


    // Informations générales

    $table->string('type')->nullable();// ✅ Critique

    $table->string('marque');             // ✅ Critique
    $table->string('modele');             // ✅ Critique
    $table->string('couleur')->nullable();         // ✅ Optionnel
    $table->string('immatriculation')->unique();   // ✅ Critique
    $table->integer('places_disponibles')->nullable();         // ✅ Critique

    // Documents et vérification
    $table->string('carte_grise')->nullable();     // ✅ Optionnel
    $table->boolean('est_verifie')->default(false); // ✅ Critique
    $table->string('photo_vehicule')->nullable();  // ✅ Optionnel

    // Dates
    $table->timestamp('date_ajout')->useCurrent(); // ✅ Critique

    // Relation conducteur
    $table->uuid('conducteur_id'); // ✅ Critique

    $table->timestamps();

    // Clé étrangère
    $table->foreign('conducteur_id')->references('id')->on('utilisateurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
