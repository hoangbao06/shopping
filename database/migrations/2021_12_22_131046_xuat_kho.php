<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class XuatKho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('XuatKho', function (Blueprint $XuatKho) {
            $XuatKho->increments('idXuatKho');
            $XuatKho->unsignedInteger('id_San_Pham');
            $XuatKho->date('NgayXuatKho');
            $XuatKho->float('soluong_XK', 8, 2);
            $XuatKho->unsignedInteger('id_tinhtrang');
            $XuatKho->unsignedInteger('id_KhoHang');
            $XuatKho->foreign('id_KhoHang')->references('idKhoHang')->on('KhoHang');
            $XuatKho->foreign('id_San_Pham')->references('idSanPham')->on('SanPham');
            $XuatKho->foreign('id_tinhtrang')->references('idTinhTrangXuatNhap')->on('TinhTrangXuatNhap');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('XuatKho');
    }
}
