<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespCounterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resp_counters', function (Blueprint $table) {
            $table->increments('counterid')->unique();
            $table->string('respid');
            $table->string('projectid');
            $table->integer('Languageid');
            $table->string("status");
            $table->string("IP");
            $table->timestamp("enddate");
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
