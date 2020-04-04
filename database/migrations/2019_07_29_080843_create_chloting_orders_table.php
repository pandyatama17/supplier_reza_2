<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChlotingOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('clothing_orders', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('code');
          $table->integer("user_id");
          $table->longText("address");
          $table->integer("phone");
          $table->integer("subtotal");
          $table->integer("fees");
          $table->integer("total");
          $table->boolean('confirm_start')->default(0);
          $table->boolean('confirm_finish')->default(0);
          $table->string('tracking_number')->nullable();
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
        Schema::dropIfExists('chloting_orders');
    }
}
