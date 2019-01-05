<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->char('name', 100);	
            $table->string('description');
            $table->string('image');
            $table->decimal('price');	
            $table->string('type');	
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
        $table->increments('id');

        $table->char('name', 100);	
        $table->string('description');
        $table->string('image');
        $table->decimal('price');	
        $table->string('type');	
    }
}
