<?php

use App\Models\AnneeScolaire;
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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('nom_classe');
            $table->integer('niveau');
            $table->integer('effectif_total')->nullable();
            $table->integer('effectif_garcon')->nullable();
            $table->integer('effectif_fille')->nullable();
            $table->integer('nom_place');
            $table->foreignId('annee_scolaire_id')->constrained();
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
