<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelatedTechniquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('related_techniques', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('related_from')->unsigned();
            $table->integer('related_to')->unsigned(); 

            $table->foreign('related_from')->references('id')->on('techniques');
            $table->foreign('related_to')->references('id')->on('techniques'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('related_techniques'); 
        Schema::enableForeignKeyConstraints();
    }
}
