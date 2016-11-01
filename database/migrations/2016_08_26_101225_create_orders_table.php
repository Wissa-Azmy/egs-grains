<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('customer_id')->unsigned()->index();
            $table->integer('supplier_id')->unsigned()->index();
            $table->integer('quantity');
            $table->integer('unit_price');
            $table->integer('expenses');
            $table->double('total', 15, 10);
            $table->double('paid', 15, 10);
            $table->boolean('currency', array('0', '1'));
            $table->enum('port', array('1', '2'));
            $table->enum('type', array('1', '2'));
            $table->enum('transportation', array('1', '2'));
            $table->enum('location', array('1','2'));
            $table->boolean('revised');
            $table->text('notes');

            $table->softDeletes();
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
        Schema::drop('orders');
    }
}
