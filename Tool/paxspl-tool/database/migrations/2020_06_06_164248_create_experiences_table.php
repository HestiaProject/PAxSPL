<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps(); 
            $table->integer('time');  
            $table->text('difficulty');
            $table->text('obs')->nullable();;
             
            $table->integer('assemble_process_id')->unsigned();  
            $table->foreign('assemble_process_id')->references('id')->on('assemble_processes');  
            $table->integer('activity_id')->unsigned();  
            $table->foreign('activity_id')->references('id')->on('activities');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
}
