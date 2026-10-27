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
        Schema::create('fiche_renseignements', function (Blueprint $table) {
            $table->id();
            $table->integer('niveau');
            $table->decimal('frais_inscription');
            $table->decimal('frais_reinscription');
            $table->decimal('tranche1');
            $table->decimal('tranche2');
            $table->decimal('tranche3');
            $table->timestamps();
        });
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fiche_renseignements');
    }
};
