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
        Schema::create('payement_salaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('salaire_id')->constrained();
            $table->foreignId('compte_id')->constrained();
            $table->enum('type_payement', ['avance sur salaire','salaire net','bon'])->default('salaire net');
            $table->decimal('montant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payement_salaires');
    }
};
