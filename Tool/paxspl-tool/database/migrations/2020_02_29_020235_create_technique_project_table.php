<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechniqueProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technique_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->text('reason')->nullable();;
            $table->integer('project_id')->unsigned();
            $table->integer('technique_id')->unsigned(); 

            $table->foreign('project_id')->references('id')->on('projects');
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
        Schema::dropIfExists('technique_project');
    }
}
