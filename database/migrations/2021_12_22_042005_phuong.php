<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Phuong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Phuong', function (Blueprint $table) {
            $table->increments('idPhuong');
            $table->string('namePhuong', 30);
            $table->unsignedInteger('idquan');
            $table->foreign('idquan')->references('idQuan')->on('Quan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Phuong');
    }
}
