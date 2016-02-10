<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('audition_name');
            $table->string('description', 1000);
            $table->string('country');
            $table->string('city');
            $table->integer('budget');
            $table->integer('num_directors')->nullable();
            $table->integer('num_producers')->nullable();
            $table->integer('num_cameraman')->nullable();
            $table->integer('num_film_editors')->nullable();
            $table->integer('num_sound_designers')->nullable();
            $table->integer('num_actors')->nullable();
            $table->integer('num_extras')->nullable();
            $table->integer('pay_directors')->nullable();
            $table->integer('pay_producers')->nullable();
            $table->integer('pay_cameraman')->nullable();
            $table->integer('pay_film_editors')->nullable();
            $table->integer('pay_sound_designers')->nullable();
            $table->integer('pay_actors')->nullable();
            $table->integer('pay_extras')->nullable();

            $table->integer('agency_id')->unsigned();
            $table->foreign('agency_id')
                    ->references('id') 
                    ->on('agencies')
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
        Schema::drop('auditions');
    }
}
