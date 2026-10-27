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
        Schema::create('effectif_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classe_id')->constrained();
            $table->integer('total_eleve');
            $table->enum('mois',['Janvier','Février','Mars','Avril','Mais','Juin','Juiellet','Août','Séptembre','Octombre','Novembre','Decembre']);
            $table->foreignId('annee_scolaire_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('effectif_classes');
    }
};
