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
        Schema::create('diploms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('niveau',['BAC','BAC+2','BAC+3']);
            $table->string('institution');
            $table->date('date_obtenu');
            $table->string('mention');
            $table->string('filliere');
            $table->string('ID_Dipolm');
            $table->string('cin');
            $table->string('photo');

            $table->foreign('cin')->references('cin')->on('agens')
                ->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diploms');
    }
};
