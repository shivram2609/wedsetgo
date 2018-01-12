<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmspagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
   Schema::create('cmapages', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('content');
			$table->string('metatitle');
			$table->string('seourl');
			$table->string('metadesc');
			$table->string('metakeyword');
			$table->integer('status');
			$table->integer('showinfooter');
			$table->integer('showinleft');
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
	 Schema::drop('cmapages');
    } 
}
