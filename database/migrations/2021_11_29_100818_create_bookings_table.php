<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fasilityID');
            $table->date('bookingDate');
            $table->time('startTime');
            $table->time('endTime');
            $table->unsignedBigInteger('userID');
            $table->enum('status',['waiting','approved','rejected'])->default('waiting');
            $table->timestamps();

            $table->foreign('fasilityID')->references('id')->on('fasilities');
            $table->foreign('userID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
