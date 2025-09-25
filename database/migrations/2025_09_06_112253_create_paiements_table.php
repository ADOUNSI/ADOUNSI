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
        Schema::create('paiements', function (Blueprint $table) {

   $table->uuid('id')->primary()->default(DB::raw('(UUID())'));// idPaiement


    // Montants
    $table->float('montant');             // ✅ Critique
    $table->float('commission')->default(0); // ✅ Critique

    // Méthode et statut
    $table->enum('mode_paiement', ['espèces', 'mobile_money', 'carte'])->nullable(); // ✅ Optionnel
    $table->enum('statut', ['en_attente', 'effectué', 'échoué', 'remboursé'])->default('en_attente'); // ✅ Critique
    $table->timestamp('date_transaction')->useCurrent(); // ✅ Critique

    // Référence externe (ex : ID de transaction mobile money)
    $table->string('reference_externe')->nullable(); // ✅ Optionnel

    // Remboursement
    $table->boolean('est_remboursee')->default(false); // ✅ Critique
    $table->string('motif_remboursement')->nullable(); // ✅ Optionnel

    // Relations
    $table->uuid('reservation_id')->nullable(); // ✅ Optionnel
    $table->uuid('payeur_id');                 // ✅ Critique
    $table->uuid('beneficiaire_id');           // ✅ Critique

    $table->timestamps();

    // Clés étrangères
    $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('set null');
    $table->foreign('payeur_id')->references('id')->on('utilisateurs')->onDelete('cascade');
    $table->foreign('beneficiaire_id')->references('id')->on('utilisateurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
