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
        Schema::create('recu_payements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payement_id')->constrained();
            $table->date('date_recu');
            $table->float('montant_paye');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recu_payements');
    }
};
