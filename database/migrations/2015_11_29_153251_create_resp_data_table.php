<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resp_counters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('counterid');
            $table->string('respid');
            $table->string('projectid');
            $table->string('about');
            $table->string('Languageid');
            $table->string('status');
            $table->string('IP');
            $table->string('enddate');
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
        Schema::drop('resp_counters');
    }
}
