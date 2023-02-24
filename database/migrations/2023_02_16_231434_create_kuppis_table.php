<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuppisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuppis', function (Blueprint $table) {
            $table->id();
            $table->String('kuppiname');
            $table->String('subject');
            $table->String('freetime');
            $table->String('place');
            $table->String('seniorName');
            $table->String('senioremail');
            $table->String('seniourregid');
            $table->String('on/off');
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
        Schema::dropIfExists('kuppis');
    }
}
