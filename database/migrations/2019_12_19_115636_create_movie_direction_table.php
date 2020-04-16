<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieDirectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_direction', function (Blueprint $table) {
            $table->bigInteger('dir_id')->unsigned();
            $table->bigInteger('mov_id')->unsigned();
            $table->foreign('mov_id')->references('mov_id')->on('movie')->onDelete('cascade');
            $table->foreign('dir_id')->references('dir_id')->on('director')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_direction');
    }
}
