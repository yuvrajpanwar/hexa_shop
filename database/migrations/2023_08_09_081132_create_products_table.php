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
        $table->id();
        $table->string('title');
        $table->string('description');
        $table->string('image');
        $table->unsignedBigInteger('price');
        $table->unsignedTinyInteger('category'); 
        $table->enum('status', ['sold', 'available']);
        $table->timestamps();
        
        $table->foreign('category')->references('id')->on('categories')->onDelete('cascade'); 
        
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
