<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{ 
	public function up()
    {
         Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('sender_id');
			$table->integer('receiver_id');
			$table->string('message');
			$table->integer('status');
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
         Schema::drop('messages');
    }
}
