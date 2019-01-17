<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details.', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id',11);
            $table->string('product_id',11);
            $table->integer('qty',10);
            $table->integer('price');
            $table->integer('status');
            $table->timestamps('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details.');
    }
}
