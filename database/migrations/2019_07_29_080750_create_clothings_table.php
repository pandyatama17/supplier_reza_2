<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClothingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('clothings', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->string('name');
         $table->string('material');
         $table->integer('per_unit_price');
         $table->integer('per_score_price');
         $table->integer('per_dozen_price');
         $table->string('description');
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
        Schema::dropIfExists('clothings');
    }
}
