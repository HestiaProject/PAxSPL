<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatureArtifactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_artifacts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
             

            $table->integer('feature_id')->unsigned();
            $table->integer('artifact_id')->unsigned(); 

            $table->foreign('feature_id')->references('id')->on('features');
            $table->foreign('artifact_id')->references('id')->on('artifacts'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feature_artifacts');
    }
}
