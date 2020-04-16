<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieCastTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_cast', function (Blueprint $table) {
            $table->bigInteger('act_id')->unsigned();
            $table->bigInteger('mov_id')->unsigned();
            $table->foreign('mov_id')->references('mov_id')->on('movie')->onDelete('cascade');
            $table->foreign('act_id')->references('act_id')->on('movie_actor')->onDelete('cascade');
            $table->char('role',80);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_cast');
    }
}
