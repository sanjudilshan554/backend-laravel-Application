<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEduQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_qualifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registrations_id');
            $table->foreign('registrations_id')->references('id')->on('registrations')->onDelete('cascade');
            
            $table->unsignedBigInteger('lecture_regs_id');
            $table->foreign('lecture_regs_id')->references('id')->on('lecture_regs')->onDelete('cascade');
            $table->String('name');
            
            $table->LongText('description');
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
        Schema::dropIfExists('edu_qualifications');
    }
}
