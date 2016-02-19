<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfilInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('profils', function(Blueprint $table)
        {
            $table->char('sex');
            $table->string('destination');
            $table->string('interests');
            $table->text('about');
            $table->string("profil_picture_name")->nullable();
            $table->integer("profil_picture_size")->nullable();
            $table->string("profil_picture_content_type")->nullable();
            $table->string("looking_for");

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
