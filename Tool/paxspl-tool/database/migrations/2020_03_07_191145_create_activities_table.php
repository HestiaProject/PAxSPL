<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('phase');
            $table->integer('order');

            $table->integer('assemble_processes_id')->unsigned();
            $table->integer('technique_id')->unsigned(); 

            $table->foreign('assemble_processes_id')->references('id')->on('assemble_processes');
            $table->foreign('technique_id')->references('id')->on('techniques'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
        Schema::enableForeignKeyConstraints();
    }
}
