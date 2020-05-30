<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatureModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_models', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name'); 
            $table->text('xml');
             
            $table->integer('project_id')->unsigned();  
            
            $table->foreign('project_id')->references('id')->on('projects');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feature_models');
    }
}
