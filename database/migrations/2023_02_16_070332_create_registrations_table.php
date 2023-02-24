<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->String('fname');
            $table->String('lname');
            $table->String('age');
            $table->String('workingPlace');
            $table->String('school');
            $table->String('email');
            $table->String('address');
            $table->String('postelcode');
            $table->String('city');
            $table->String('Province');
            $table->String('District');
            $table->String('country');
            $table->String('gender');
            $table->String('mobNo');
            $table->String('currentDegree');
            $table->String('currentYear');
            $table->String('SpKnowledge');
            $table->String('EdQualification');
            $table->String('FamSoftware');
            $table->String('SubjectKnow');
            $table->String('Certification');
            $table->String('unvRegNo');
            $table->String('password');
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
        Schema::dropIfExists('registrations');
    }
}
