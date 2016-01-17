<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIiwwTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iiww', function (Blueprint $table) {
            $table->integer('user_1_id')->unsigned();
            $table->foreign('user_1_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->integer('user_2_id')->unsigned();
            $table->foreign('user_2_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->integer('accepted');
            $table->primary(['user_1_id', 'user_2_id']);
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
        Schema::drop('iiww');
    }
}
