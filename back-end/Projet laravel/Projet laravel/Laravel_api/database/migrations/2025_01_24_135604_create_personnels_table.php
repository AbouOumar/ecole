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
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->string('matricule_personnel');
            $table->string('nom_personnel');
            $table->string('prenom_personnel');
            $table->enum('genre_personnel',['Masculin','Féminin']);
            $table->date('date_nais_personnel');
            $table->string('tel_personnel');
            $table->string('mail_personnel');
            $table->string('adresse_personnel');
            $table->string('photo')->default('avatar.png');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnels');
    }
};
