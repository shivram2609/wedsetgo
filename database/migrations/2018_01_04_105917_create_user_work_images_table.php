<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserWorkImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	Schema::create('user_work_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_work_id')->unsigned();
			$table->foreign('user_work_id')->references('id')->on('user_works');
			$table->string('images');
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
	 Schema::drop('user_work_images');
    }
}
