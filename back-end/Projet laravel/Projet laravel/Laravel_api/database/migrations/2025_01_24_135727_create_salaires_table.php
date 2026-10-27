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
        Schema::create('salaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personnel_id')->constrained();
            $table->enum('mois',['Janvier','Février','Mars','Avril','Mais','Juin','Juiellet','Août','Séptembre','Octombre','Novembre','Decembre']);
            $table->foreignId('annee_scolaire_id')->constrained();
            $table->float('salaire_brut');
            $table->float('avance_salaire');
            $table->float('salaire_net');
            $table->float('prime');
            $table->integer('disponibilite');
            $table->enum('statut',['payé','non payé']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaires');
    }
};
