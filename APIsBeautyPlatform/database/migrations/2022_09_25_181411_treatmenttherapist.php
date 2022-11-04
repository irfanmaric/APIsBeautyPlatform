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
        Schema::create('TreatmentTherapist', function (Blueprint $table) {
            $table->id();
            $table->foreignId('TreatmentID')->constrained('treatment');
            $table->foreignId('TherapistID')->constrained('therapist');
            $table->foreignId('ReservationID')->constrained('reservation');
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
