<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('signalements', function (Blueprint $table) {
    $table->uuid('id')->primary(); // idSignalement

    // Relations
    $table->uuid('auteur_id');         // ✅ Critique
    $table->uuid('cible_id');          // ✅ Critique
    $table->uuid('trajet_id')->nullable();     // ✅ Optionnel
    $table->uuid('moderateur_id')->nullable(); // ✅ Optionnel

    // Contenu du signalement
    $table->string('motif');           // ✅ Critique
    $table->text('description');       // ✅ Critique
    $table->timestamp('date_signalement')->useCurrent(); // ✅ Critique

    // Suivi du traitement
    $table->enum('statut', ['en_attente', 'en_cours', 'traité', 'rejeté'])->default('en_attente'); // ✅ Critique
    $table->enum('action', ['aucune', 'avertissement', 'suspension', 'suppression'])->default('aucune'); // ✅ Critique
    $table->timestamp('date_traitement')->nullable(); // ✅ Optionnel

    $table->timestamps();

    // Clés étrangères
    $table->foreign('auteur_id')->references('id')->on('utilisateurs')->onDelete('cascade');
    $table->foreign('cible_id')->references('id')->on('utilisateurs')->onDelete('cascade');
    $table->foreign('trajet_id')->references('id')->on('trajets')->onDelete('set null');
    $table->foreign('moderateur_id')->references('id')->on('utilisateurs')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signalements');
    }
};
