<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwarFilterPlusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swar_filter_plus', function (Blueprint $table) {
            $table->id();

            $table->string('section');
            $table->bigInteger('begin_aiya');
            $table->bigInteger('end_aiya');
            $table->bigInteger('juza');
            $table->bigInteger('wageh');
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
        Schema::dropIfExists('swar_filter_plus');
    }
}
