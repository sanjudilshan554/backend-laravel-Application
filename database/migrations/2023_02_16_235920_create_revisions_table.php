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
            $table->unsignedBigInteger('registrations_id');
            $table->foreign('registrations_id')->references('id')->on('registrations')->onDelete('cascade');
            
            //  $table->unsignedBigInteger('registrations_id')->nullable();;
            // $table->foreign('registrations_id')->references('id')->on('registrations')->onDelete('cascade');
            
            $table->String('revName');
            $table->String('subject');
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