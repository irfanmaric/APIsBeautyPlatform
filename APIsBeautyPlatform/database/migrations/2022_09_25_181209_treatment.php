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
        Schema::create('Treatment', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', $precision = 8, $scale = 2);
            $table->integer('Duration');
            $table->string('Description');
            $table->foreignId('UserID')->constrained('users');
            $table->foreignId('TherapistID')->constrained('therapist');
            $table->foreignId('VenuesID')->constrained('venues');
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
