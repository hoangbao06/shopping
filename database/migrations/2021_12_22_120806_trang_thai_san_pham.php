<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TrangThaiSanPham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TrangThaiSanPham', function (Blueprint $table) {
            $table->increments('idTrangThai_SanPham');
            $table->string('nameTrangThai_SanPham', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TrangThaiSanPham');
    }
}
