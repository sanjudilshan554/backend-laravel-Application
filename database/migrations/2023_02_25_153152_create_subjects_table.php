<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registrations_id')->nullable();;
            $table->foreign('registrations_id')->references('id')->on('registrations')->onDelete('cascade');

            $table->unsignedBigInteger('lecture_regs_id')->nullable();;
            $table->foreign('lecture_regs_id')->references('id')->on('lecture_regs')->onDelete('cascade');

            $table->json('year')->nullable();;
            $table->json('semester')->nullable();;
            $table->json('subject')->nullable();;
            $table->json('rating')->nullable();;
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
