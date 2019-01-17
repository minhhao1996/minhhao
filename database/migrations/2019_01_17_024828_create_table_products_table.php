<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products.', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cat_id');
            $table->string('maker_id');
            $table->string('name');
            $table->string('code')->unsigned();;
            $table->string('contents');
            $table->string('discount')->unsigned();;
            $table->string('avatar');
            $table->string('views')->default(0);
            $table->string('title')->unsigned();;
            $table->string('warranty')->unsigned();;
            $table->string('total')->default(0);
            $table->string('buyed')->default(0);
            $table->string('gifts');
            $table->tinyInteger('status')->default(0);
            $table->date('created_at');
            $table->timestamps('update_at')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products.');
    }
}
