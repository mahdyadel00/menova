<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->integer('domain_id')->unsigned();
            $table->integer('project_type_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('attachment')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('project_type_id')->references('id')->on('project_types')->onUpdate('cascade');
            $table->foreign('domain_id')->references('id')->on('domains')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}