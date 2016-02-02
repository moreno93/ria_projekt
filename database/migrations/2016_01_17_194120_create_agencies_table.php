<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencies', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('agency_name');
            $table->string('agency_pic')->nullable();
            $table->string('description', 1000);
            $table->string('headquarters')->nullable();
            $table->string('foundation_year')->nullable();

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
                    ->references('id') 
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('agencies');
    }
}
