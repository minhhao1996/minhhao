<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders.', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id',11)->nullable();
            $table->string('username',50);
            $table->integer('phone',11);
            $table->string('email',50);
            $table->string('address',255);
            $table->integer('amount',50);
            $table->string('data',255)->nullable();
            $table->string('payment',20);
            $table->string('payment_info',20)->nullable();;
            $table->tinyInteger('status',1);
            $table->date('create_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders.');
    }
}
