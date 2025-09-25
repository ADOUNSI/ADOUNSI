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
        Schema::create('messages', function (Blueprint $table) {

    $table->uuid('id')->primary()->default(DB::raw('(UUID())'));

    $table->uuid('chat_id')->nullable(); // PAS de foreign key ici
    $table->uuid('expediteur_id');

    $table->text('contenu');
    $table->timestamp('date_envoi')->useCurrent();

    $table->enum('statut', ['lu', 'non_lu', 'supprimé'])->default('non_lu');
    $table->enum('type', ['texte', 'image', 'lien', 'alerte'])->default('texte');

    $table->timestamps();

    $table->foreign('expediteur_id')->references('id')->on('utilisateurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
