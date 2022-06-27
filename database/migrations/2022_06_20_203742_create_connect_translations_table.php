<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connect_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('connect_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->longText('description');

            $table->unique(['connect_id', 'locale']);
            $table->foreign('connect_id')->references('id')->on('connects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('connect_translations');
    }
}
