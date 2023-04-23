<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisions', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('Requester_id');
            $table->foreign('Requester_id')->references('id')->on('registrations')->onDelete('cascade');
            
            $table->unsignedBigInteger('lectureRegId');
            $table->foreign('lectureRegId')->references('id')->on('lecture_regs')->onDelete('cascade');
            
            $table->String('revName');
            $table->String('subject');
            $table->String('contact');
            $table->String('freetime');
            $table->String('lecHallName');
            $table->String('lectureName');
            $table->String('lecturemail');
            $table->String('lectureempID');
            $table->String('members');
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
        Schema::dropIfExists('revisions');
    }
}