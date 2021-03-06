<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_type_id')->unsigned();
			$table->foreign('user_type_id')->references('id')->on('user_types');
			$table->string('email')->unique();
			$table->string('password');
			$table->integer('is_active');
			$table->string('confimation_token');
			$table->string('forgot_password_token');
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
	 Schema::drop('users');
    }
}
