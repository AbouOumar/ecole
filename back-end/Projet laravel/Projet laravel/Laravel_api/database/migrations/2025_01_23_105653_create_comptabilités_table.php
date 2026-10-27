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
        Schema::create('comptabilités', function (Blueprint $table) {
            $table->id();
            $table->foreignId('annee_scolaire_id')->constrained();
            $table->decimal('recette_banque')->default(0);
            $table->decimal('depense_comptable')->default(0);
            $table->decimal('reboursement_dette')->default(0);
            $table->decimal('frais_loyer')->default(0);
            $table->decimal('total_reduction_annuelle')->default(0);
            $table->decimal('impayer_global')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comptabilités');
    }
};
