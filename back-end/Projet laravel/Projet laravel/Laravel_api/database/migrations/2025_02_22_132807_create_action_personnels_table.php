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
        Schema::create('action_personnels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personnel_id');
            $table->enum('mois',['Janvier','Février','Mars','Avril','Mais','Juin','Juiellet','Août','Séptembre','Octombre','Novembre','Decembre']);
            $table->string('type');
            $table->string('fonction');
            $table->double('montant');
            $table->foreignId('annee_scolaire_id');
            $table->foreignId('compte_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('action_personnels');
    }
};
