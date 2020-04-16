<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieChapterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_chapter', function (Blueprint $table) {
            $table->bigInteger('mov_id')->unsigned();
            $table->bigIncrements('chapter_id')->autoIncrement();
            $table->integer('chapter_nums');
            $table->char('chapter_name',40);
            $table->text('chapter_link');
            $table->foreign('mov_id')->references('mov_id')->on('movie')->onDelete('cascade');
            $table->timestamp("chapter_time_upload");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_chapter');
    }
}
