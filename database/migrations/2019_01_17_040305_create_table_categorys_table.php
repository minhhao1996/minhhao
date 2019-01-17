<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCategorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorys.', function (Blueprint $table) {
            $table->increments('id');
            $table->string('parent_id', 11);
            $table->string('name', 50);
            $table->string('icon', 100);
            $table->integer('local', 10);
            $table->tinyInteger('status',1)->nullable();
            $table->date('create_at');
            $table->timestamps('update_at')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorys.');
    }
}
