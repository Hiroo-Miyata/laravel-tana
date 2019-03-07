<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShelfAlignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shelf_alignments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('alignment_no');
            $table->unsignedInteger('shelf_id');
            $table->double('shelf_height', 8, 2);
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
        Schema::dropIfExists('shelf_alignments');
    }
}
