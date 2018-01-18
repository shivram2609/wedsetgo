<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSliderheadingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('slider_images', function($table) {
		  $table->string('heading');
		  $table->string('description');
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('slider_images', function($table) {
			$table->dropColumn('heading');
			$table->dropColumn('description');
		});
    }
}
