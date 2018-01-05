<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maps', function (Blueprint $table) {
           $table->increments('id');
           $table->string('name');
           $table->string('description');
           $table->json('attributs');
           $table->string('img_src')->nullable();
           $table->integer('user_id')->unsigned();
           $table->integer('theme_id')->unsigned();
           $table->boolean('approve')->default(false);
           $table->boolean('share')->default(false);
           $table->timestamps();
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('maps');
    }
}
