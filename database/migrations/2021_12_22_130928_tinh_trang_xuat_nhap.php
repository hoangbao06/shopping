<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TinhTrangXuatNhap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TinhTrangXuatNhap', function (Blueprint $table) {
            $table->increments('idTinhTrangXuatNhap');
            $table->string('nameTinhTrangXuatNhap');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TinhTrangXuatNhap');
    }
}
