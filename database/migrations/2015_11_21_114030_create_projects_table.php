<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Project ID');
            $table->string("Country");
            $table->string('About');
            $table->string('C_Link');
            $table->string('T_Link');
            $table->string('Q_Link');
            $table->integer('Completes');
            $table->integer('Terminates');
            $table->integer('Quotafull');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projects_list');
    }
}
