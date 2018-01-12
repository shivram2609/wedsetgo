<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('gender');
			$table->string('profile_image');
			$table->string('other_detail');
			$table->rememberToken();
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
        Schema::drop('user_details');
    }
}
