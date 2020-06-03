<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('type'); 
            $table->integer('height');
            $table->text('description');
            $table->boolean('abstract')->default(false);
             
            $table->integer('feature_model_id')->unsigned(); 
            $table->integer('parent')->nullable()->unsigned(); 
            $table->foreign('feature_model_id')->references('id')->on('feature_models'); 
            $table->foreign('parent')->references('id')->on('features'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('features');
    }
}
