<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LayerMap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layer_map', function (Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('layer_id');
            $table->unsignedInteger('map_id');
            $table->foreign('layer_id')->references('id')->on('layers')->onDelete('cascade');
            $table->foreign('map_id')->references('id')->on('maps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('layer_map');
    }
}
