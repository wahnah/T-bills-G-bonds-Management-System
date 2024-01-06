<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbids', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('premium')->nullable();
            $table->unsignedBigInteger('lot_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('bidtype')->nullable();
            $table->unsignedBigInteger('cat_id')->nullable();
            $table->bigInteger('multiple')->nullable();
            $table->unsignedInteger('duration')->nullable();
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
        Schema::dropIfExists('tbids');
    }
}
