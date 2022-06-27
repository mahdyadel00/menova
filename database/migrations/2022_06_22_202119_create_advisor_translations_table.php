<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvisorTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advisor_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('advisor_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->longText('description');

            $table->unique(['advisor_id', 'locale']);
            $table->foreign('advisor_id')->references('id')->on('advisors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advisor_translations');
    }
}
