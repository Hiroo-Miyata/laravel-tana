<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFurnitureAlignmentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('furniture_alignment_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('display_varsion_id');
            $table->unsignedInteger('alignment_no');
            $table->unsignedInteger('furniture_id');
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
        Schema::dropIfExists('furniture_alignment_histories');
    }
}
