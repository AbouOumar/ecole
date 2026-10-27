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
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->string('matricule_eleve');
            $table->string('nom_eleve');
            $table->string('prenom_eleve');
            $table->enum('genre_eleve',['Masculin','Féminin']);
            $table->date('Date_naiss');
            $table->string('photo')->default('avatar.png');
            $table->string('tel_eleve')->nullable();
            $table->foreignId('classe_id')->nullable();
           
            $table->timestamps();
            $table->enum('statut_scolaire',['Promu','Redoublant'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleves');
    }
};
