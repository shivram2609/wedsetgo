<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisionBookCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
   Schema::create('vision_book_collections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vision_book_id')->unsigned();
			$table->foreign('vision_book_id')->references('id')->on('vision_books');
			$table->string('images');
			$table->string('comments');
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
	 Schema::drop('vision_book_collections');
    }
}
