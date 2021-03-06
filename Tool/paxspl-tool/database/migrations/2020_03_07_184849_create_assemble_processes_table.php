<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssembleProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assemble_processes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->text('diagram');
            
            $table->string('type');
            $table->string('status')->default("created");
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
        Schema::dropIfExists('assemble_processes');
        Schema::enableForeignKeyConstraints();
    }
}
