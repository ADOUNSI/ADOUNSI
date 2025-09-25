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
        Schema::create('utilisateurs', function (Blueprint $table) {
     $table->uuid('id')->primary();


    // Identité
    $table->string('nom');
    $table->string('prenom');
    $table->string('email')->unique(); // ✅ Critique
    $table->string('mot_de_passe');     // ✅ Critique
    $table->string('telephone')->nullable();
    $table->json('reseaux_sociaux')->nullable();
    $table->string('photo_profil')->nullable();
    $table->enum('role', ['passager', 'conducteur', 'admin']); // ✅ Critique
    $table->timestamp('date_inscription')->useCurrent();

    // Évaluation
    $table->float('note_moyenne')->default(0);
    $table->integer('nombre_evaluations')->default(0);

    // Trajets et préférences
    $table->json('moyen_paiement_favori')->nullable();
    $table->json('preferences_trajet')->nullable();

    // Documents conducteur
    $table->string('cni')->nullable();
    $table->string('permis_conduire')->nullable();
    $table->string('carte_grise')->nullable();
    $table->boolean('est_verifie')->default(false);
    $table->float('total_gains')->default(0);
    $table->integer('nombre_trajets')->default(0);
    $table->float('latitude')->nullable();   // ✅ remplacement du point
    $table->float('longitude')->nullable();  // ✅ remplacement du point

    // Modération admin
    $table->enum('niveau_acces', ['modérateur', 'superAdmin'])->nullable();
    $table->enum('statut_compte', ['actif', 'suspendu', 'supprimé'])->default('actif');
    $table->json('droits')->nullable();
    $table->integer('signalements_traites')->default(0);
    $table->integer('actions_effectuees')->default(0);
    $table->timestamp('derniere_connexion')->nullable();
    $table->timestamp('date_creation')->useCurrent();

    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
