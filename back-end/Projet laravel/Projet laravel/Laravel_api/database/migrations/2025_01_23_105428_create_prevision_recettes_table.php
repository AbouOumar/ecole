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
        Schema::create('prevision_recettes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classe_id')->constrained();
            $table->enum('mois',['Janvier','Février','Mars','Avril','Mais','Juin','Juiellet','Août','Séptembre','Octombre','Novembre','Decembre']);
            $table->foreignId('annee_scolaire_id')->constrained();
            $table->decimal('recette_previsonelle_brute');
            $table->decimal('reduction_annuelle');
            $table->decimal('recette_previsonnelle_nette');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prevision_recettes');
    }
};
