<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('album_id')->unsigned();
            $table->string('file_name');
            $table->string('file_path');
            $table->string('thumbnail');
            $table->string('thumbnail_path');
            $table->string('name');
            $table->text('description');
            $table->boolean('cover');
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::drop('images');
    }
}
