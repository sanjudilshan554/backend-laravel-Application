<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoftwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registrations_id')->nullable();
            $table->foreign('registrations_id')->references('id')->on('registrations')->onDelete('cascade');
           
            $table->unsignedBigInteger('Lecture_regs_id')->nullable();
            $table->foreign('Lecture_regs_id')->references('id')->on('Lecture_regs')->onDelete('cascade');
            
            $table->String('software1')->nullable();
            $table->String('software2')->nullable();
            $table->String('software3')->nullable();
            $table->String('software4')->nullable();
            $table->json('rating');
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
        Schema::dropIfExists('software');
    }
}
