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
        Schema::create('attivitàs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('descrizione');
            $table->string('stato');
            $table->date('data_scadenza');
            $table->unsignedBigInteger('progetto_id');
            $table->timestamps();

            $table->foreign('progetto_id')->references('id')->on('progettos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attivitàs');
    }
};
