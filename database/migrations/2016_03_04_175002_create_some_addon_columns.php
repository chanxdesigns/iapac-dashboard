<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSomeAddonColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects_list', function (Blueprint $table) {
            $table->string('Country')->after('Project ID');
            $table->string('Vendor')->after('About');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects_list', function (Blueprint $table) {
            $table->dropColumn(['Country','Vendor']);
        });
    }
}
