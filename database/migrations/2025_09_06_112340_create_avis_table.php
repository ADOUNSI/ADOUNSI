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
        Schema::create('avis', function (Blueprint $table) {
$table->uuid('id')->primary(); // idAvis

    // Relations
    $table->uuid('auteur_id');       // ✅ Critique
    $table->uuid('cible_id');        // ✅ Critique
    $table->uuid('reservation_id')->nullable(); // ✅ Optionnel
    $table->uuid('trajet_id')->nullable();      // ✅ Optionnel

    // Contenu de l’avis
    $table->integer('note');         // ✅ Critique
    $table->text('commentaire');     // ✅ Critique
    $table->timestamp('date_avis')->useCurrent(); // ✅ Critique
    $table->enum('type', ['conducteur', 'passager'])->default('passager'); // ✅ Critique

    // Modération
    $table->boolean('est_modere')->default(false);  // ✅ Critique
    $table->string('motif_moderation')->nullable(); // ✅ Optionnel

    $table->timestamps();

    // Clés étrangères
    $table->foreign('auteur_id')->references('id')->on('utilisateurs')->onDelete('cascade');
    $table->foreign('cible_id')->references('id')->on('utilisateurs')->onDelete('cascade');
    $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('set null');
    $table->foreign('trajet_id')->references('id')->on('trajets')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis');
    }
};
