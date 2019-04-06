<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachineLearningDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_learning_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('review_id')->unsigned();
            $table->foreign('review_id')->references('id')->on('reviews');
            $table->bigInteger('movie_id')->unsigned();
            $table->foreign('movie_id')->references('id')->on('movies');
            $table->boolean('previous_rating');
            $table->boolean('updated_rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machine_learning_data');
    }
}
