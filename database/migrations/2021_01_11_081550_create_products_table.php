<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->decimal('price');
            $table->string('category');
            $table->string('description');
            $table->bigInteger('quantity');
            $table->string('linkImg1')->default('https://i.ibb.co/HtmJCZ8/no-Available-Image.png');
            $table->string('linkImg2')->default('https://i.ibb.co/HtmJCZ8/no-Available-Image.png');
            $table->string('linkImg3')->default('https://i.ibb.co/HtmJCZ8/no-Available-Image.png');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
