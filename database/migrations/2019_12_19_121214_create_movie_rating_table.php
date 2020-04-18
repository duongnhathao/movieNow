<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class CreateMovieRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_rating', function (Blueprint $table) {
            $table->bigIncrements('mov_rating_id');
            $table->bigInteger('mov_id')->unsigned();
            $table->bigInteger('rev_id')->unsigned();
            $table->float('rev_starts')->nullable(false);
            $table->date('rev_date')->default(Carbon::now());
            $table->foreign('mov_id')->references('mov_id')->on('movie')->onDelete('cascade');
            $table->foreign('rev_id')->references('rev_id')->on('viewer')->onDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_rating');
    }
}
