<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEntitiesToBondPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bondPrice', function (Blueprint $table) {
            $table->string('tenderNo');
            $table->double('bprice', 6, 4);
            $table->unsignedInteger('duration');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bondPrice', function (Blueprint $table) {
            //
        });
    }
}
