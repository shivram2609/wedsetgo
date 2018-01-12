<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('rating_points');
			$table->integer('user_work_id');
			$table->integer('professional_id');
			$table->integer('user_id');
			$table->string('comment');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('ratings');
    }
}
