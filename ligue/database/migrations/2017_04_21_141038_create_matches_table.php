<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('visitor_team');
            $table->integer('local_team');
            $table->timestamps('datetime');
            $table->string('localisation');
            $table->integer('season_id');
            $table->integer('winning_team');
            $table->integer('final_score_local');
            $table->integer('final_score_visitor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
