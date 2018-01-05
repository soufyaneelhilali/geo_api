<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLayer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->enum('type',['RASTER','VECTOR']);
            $table->string('featuretype')->nullable();
            $table->string('table_name');
            $table->string('workspace');
            $table->string('store');
            $table->string('style')->nullable();
            $table->string('srs')->nullable();
            $table->json('bbox')->nullable();
            $table->string('description');
            $table->string('img_src')->nullable();
            $table->json('attributs')->nullable();
            $table->json('metadata')->nullable();
            $table->string('file')->nullable();
            $table->boolean('approve')->default(false);
            $table->boolean('share')->default(false);
            $table->timestamps();
            /* start Forign keys

            $table->foreign('user_id')->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->foreign('user_id')->references('id')
            ->on('users')
            ->onDelete('cascade');

            End of Forign keys*/
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('layers');
    }
}
