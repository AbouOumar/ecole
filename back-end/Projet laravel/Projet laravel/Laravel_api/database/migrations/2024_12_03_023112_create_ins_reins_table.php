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
        Schema::create('ins_reins', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['Inscription','Réinscription']);
            $table->foreignId('eleve_id')->constrained();
            $table->foreignId('classe_id')->constrained();
            $table->foreignId('annee_scolaire_id')->constrained();
            $table->float('montant');
            $table->string('moyentPayement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ins_reins');
    }
};
