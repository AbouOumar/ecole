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
        Schema::create('rapport_financiers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('annee_scolaire_id')->constrained();
            $table->decimal('recette_nette_annuelle')->default(0);
            $table->decimal('impaye_nette')->default(0);
            $table->decimal('depense_fonctionnement')->default(0);
            $table->decimal('epargne_comptable')->default(0);
            $table->decimal('epargne_nette')->default(0);
            $table->decimal('deficit')->default(0);
            $table->integer('taux_impaye')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapport_financiers');
    }
};
