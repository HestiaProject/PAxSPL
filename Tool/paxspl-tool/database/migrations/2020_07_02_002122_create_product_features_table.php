<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_features', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
             

            $table->integer('feature_id')->unsigned();
            $table->integer('product_id')->unsigned(); 
           

            $table->foreign('feature_id')->references('id')->on('features');
            $table->foreign('product_id')->references('id')->on('products'); 
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_features');
    }
}
