<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsemailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
		Schema::create('cmsemails', function (Blueprint $table) {
            $table->increments('id');
			$table->string('title');
			$table->string('emailfrom');
			$table->string('subject');
			$table->string('slug');
			$table->string('content');
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
	 Schema::drop('cmsemails');
    } 
}
