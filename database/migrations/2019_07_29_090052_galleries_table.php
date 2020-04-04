<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('gallery', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('title');
          $table->string('description');
          $table->string('category');
          $table->string('date');
          $table->string('tags');
          $table->integer('photographer');
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
        //
    }
}
