<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities_artifacts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('io');
            $table->string('status')->default("created");;
            $table->text('obs')->nullable();;

            $table->integer('activity_id')->unsigned();
            $table->integer('artifact_id')->unsigned(); 

            $table->foreign('activity_id')->references('id')->on('activities');
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
        Schema::dropIfExists('activities_artifacts');
        Schema::enableForeignKeyConstraints();
    }
}
