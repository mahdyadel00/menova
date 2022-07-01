<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaisTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rais_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rais_is')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->longText('description');

            $table->unique(['rais_is', 'locale']);
            $table->foreign('rais_is')->references('id')->on('rais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rais_translations');
    }
}
