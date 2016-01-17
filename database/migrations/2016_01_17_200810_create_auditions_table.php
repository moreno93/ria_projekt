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
