<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('port_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->string('name');
            $table->foreign('port_id')
                ->references('id')->on('ports')
                ->onDelete('cascade');
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
        Schema::drop('subports');
    }
}
