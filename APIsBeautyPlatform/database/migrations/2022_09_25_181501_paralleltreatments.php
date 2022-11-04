<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ParallelTreatments', function (Blueprint $table) {
            $table->id();
            $table->integer('GroupID');
            $table->foreignId('TreatmentID')->constrained('treatment');
            $table->foreignId('RepresentativeID')->constrained('representative');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
