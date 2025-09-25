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
        Schema::create('chats', function (Blueprint $table) {
   $table->uuid('id')->primary()->default(DB::raw('(UUID())'));

    $table->uuid('conducteur_id');
    $table->uuid('passager_id');
    $table->uuid('dernier_message_id')->nullable(); // PAS de foreign key ici

    $table->timestamp('date_creation')->useCurrent();
    $table->enum('statut', ['actif', 'archivé', 'bloqué'])->default('actif');
    $table->integer('nombre_messages')->default(0);
    $table->timestamp('dernier_acces_conducteur')->nullable();
    $table->timestamp('dernier_acces_passager')->nullable();

    $table->timestamps();

    $table->foreign('conducteur_id')->references('id')->on('utilisateurs')->onDelete('cascade');
    $table->foreign('passager_id')->references('id')->on('utilisateurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
