<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtifactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artifacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->text('description');
            $table->text('external_link')->nullable();
            
            $table->timestamps();
            $table->timestamp('last_update_date')->nullable();; 
            $table->integer('project_id')->unsigned();
            $table->unsignedBigInteger('last_update_user')->unsigned();
            $table->unsignedBigInteger('owner_id')->unsigned(); 

            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('last_update_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('artifacts');
    }
}
