<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KhoHang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KhoHang', function (Blueprint $KhoHang) {
            $KhoHang->increments('idKhoHang');
            $KhoHang->float('SoLuong_KH', 8, 2);
            $KhoHang->unsignedInteger('id_San_Pham3');
            $KhoHang->unsignedInteger('id_Trang_thai2');
            $KhoHang->foreign('id_San_Pham3')->references('idSanPham')->on('SanPham');
            $KhoHang->foreign('id_Trang_thai2')->references('idTrangThai_SanPham')->on('TrangThaiSanPham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('KhoHang');
    }
}
