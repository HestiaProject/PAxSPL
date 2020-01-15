<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role');
            $table->string('retrieval_role')->default('Feature Retriever');
            $table->string('company_role')->nullable(true);
            $table->string('status')->default('Incomplete');
            $table->text('spl_exp')->nullable(true);
            $table->text('retrieval_exp')->nullable(true);
            $table->text('obs')->nullable(true);
            $table->boolean('fca')->default(false);
            $table->boolean('lsi')->default(false);
            $table->boolean('vsm')->default(false);
            $table->boolean('cluster')->default(false);
            $table->boolean('data_flow')->default(false);
            $table->boolean('dependency')->default(false);
            $table->timestamps();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('teams');
    }
}
