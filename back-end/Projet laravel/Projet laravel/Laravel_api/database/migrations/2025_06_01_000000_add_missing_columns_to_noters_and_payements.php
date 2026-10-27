<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Aligne les tables `noters`, `payements` et `users` sur le schéma réellement utilisé
 * par l'application (voir dbgestionbilly.sql). Chaque colonne n'est ajoutée
 * que si elle est absente : sans effet sur une base déjà à jour.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('noters', function (Blueprint $table) {
            if (!Schema::hasColumn('noters', 'note_orale')) {
                $table->double('note_orale')->nullable();
            }
            if (!Schema::hasColumn('noters', 'type_note')) {
                $table->string('type_note')->nullable();
            }
            if (!Schema::hasColumn('noters', 'classe_id')) {
                $table->unsignedBigInteger('classe_id')->nullable();
            }
            if (!Schema::hasColumn('noters', 'semestre')) {
                $table->integer('semestre')->nullable();
            }
            if (!Schema::hasColumn('noters', 'annee_scolaire_id')) {
                $table->unsignedBigInteger('annee_scolaire_id')->nullable();
            }
            if (!Schema::hasColumn('noters', 'mois')) {
                $table->string('mois')->nullable();
            }
        });

        Schema::table('users', function (Blueprint $table) {
            foreach (['prenomUser', 'nomUser', 'Droit', 'email', 'role', 'photosUser', 'matricule'] as $colonne) {
                if (!Schema::hasColumn('users', $colonne)) {
                    $table->string($colonne)->nullable();
                }
            }
            if (!Schema::hasColumn('users', 'telephoneUser')) {
                $table->string('telephoneUser', 20)->nullable();
            }
            if (!Schema::hasColumn('users', 'idDroit')) {
                $table->unsignedBigInteger('idDroit')->nullable();
            }
            if (!Schema::hasColumn('users', 'statut')) {
                $table->string('statut')->default('actif');
            }
        });

        Schema::table('payements', function (Blueprint $table) {
            if (!Schema::hasColumn('payements', 'id_action_ecolage')) {
                $table->integer('id_action_ecolage')->nullable()->default(0);
            }
        });
    }

    public function down(): void
    {
        // Volontairement vide : ces colonnes existent déjà en production.
    }
};
