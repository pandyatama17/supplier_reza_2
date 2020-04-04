<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChlotingOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('clothing_order_details', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer("parent_id");
          $table->integer("item_id");
          $table->integer("screening_type");
          $table->enum('size',['s','m','l','xl','xxl']);
          $table->integer("per_unit_qty");
          $table->integer("per_score_qty");
          $table->integer("per_dozen_qty");
          $table->integer("total_qty");
          $table->bigInteger("subtotal");
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
        Schema::dropIfExists('chloting_order_details');
    }
}
