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
        Schema::create('agens', function (Blueprint $table) {
            $table->string('cin')->primary();
            $table->string('nom');
            $table->string('prenom');
            $table->string('phone');
            $table->string('email');
            $table->string('adresse');
            $table->text('Observation');
            $table->date('date_naissance');
            $table->string('lieux_naissance');
            $table->enum('type', ['urbain', 'rural']);
            $table->enum('situation_familiale', ['celibataire', 'marie', 'divorce']);
            $table->integer('nombre_enfants')->nullable();
            $table->string('photo')->nullable();
            $table->date('date_embauche');





            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agens');
    }
};
