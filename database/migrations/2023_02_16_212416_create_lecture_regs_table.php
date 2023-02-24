<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLectureRegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //database files 
        Schema::create('lecture_regs', function (Blueprint $table) {
            $table->id();
            $table->String ('fname');
            $table->String ('lname');
            $table->String ('age');
            $table->String ('address');
            $table->String ('postelCode');
            $table->String ('city');
            $table->String ('province');
            $table->String ('district');
            $table->String ('country');
            $table->String ('1styrSub');
            $table->String ('2ndyrSub');
            $table->String ('3rdyrSub');
            $table->String ('4thyrSub');
            $table->String ('EduQualification');
            $table->String ('mobNumber');
            $table->String ('gender');
            $table->String ('email');
            $table->String ('empNo');
            $table->String ('password');
            $table->String('role');
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
        Schema::dropIfExists('lecture_regs');
    }
}
