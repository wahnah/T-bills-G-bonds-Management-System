<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResellBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resell_bids', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resell_id');
            $table->unsignedBigInteger('buyer_id');
            $table->bigInteger('price');
            $table->timestamps();

            $table->foreign('resell_id')->references('id')->on('resells')->onDelete('cascade');
            $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resell_bids');
    }
}
