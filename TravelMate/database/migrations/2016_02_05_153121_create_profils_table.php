<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profils', function(Blueprint $table){
			/*$table->increments('id');
			$table->tinyInteger('age');
			$table->string('location');
			$table->string('hobbies');
			$table->string('about');*/
			$table->integer('user_id');
			/*$table->timestamps();*/
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
