<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Quan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Quan', function (Blueprint $table) {
            $table->increments('idQuan');
            $table->string('nameQuan', 30);
            $table->unsignedInteger('idThanhpho');
            $table->foreign('idThanhpho')->references('idThanhPho')->on('ThanhPho');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Quan');
    }
}
