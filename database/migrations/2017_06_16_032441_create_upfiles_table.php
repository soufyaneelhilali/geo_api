<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upfiles', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->enum('type',['PDF','CSV','EXCEL','ZIP','WORD','GEODATABASE','AUTRES']);
            $table->string('description');
            $table->string('link')->nullable();
            $table->string('file')->nullable();
            $table->boolean('approve')->default(false);
            $table->boolean('share')->default(false);
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
        Schema::dropIfExists('upfiles');
    }
}
