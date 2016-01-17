<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditionUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audition_user', function (Blueprint $table) {
            $table->integer('audition_id')->unsigned()->index();
            $table->foreign('audition_id')
                    ->references('id')
                    ->on('auditions')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->primary(['audition_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('audition_user');
    }
}
