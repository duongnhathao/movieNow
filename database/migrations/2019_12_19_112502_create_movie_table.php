<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class CreateMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie', function (Blueprint $table) {
            $table->bigIncrements('mov_id')->nullable(false);
            $table->char('mov_title',50)->nullable(false)->default('Movie title');
            $table->integer('mov_year');
            $table->integer('mov_time');
            $table->char('mov_lang',50);
            $table->date('mov_rel');
            $table->char('mov_rel_country',5);
            $table->text('mov_img');
            $table->longText('mov_description');
            $table->float('nums_start')->default(0);
            $table->date('created_at')->default(Carbon::now());
            $table->date('deleted_at')->nullable(true);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie');
    }
}
