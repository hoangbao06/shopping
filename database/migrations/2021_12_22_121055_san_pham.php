<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SanPham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SanPham', function (Blueprint $SanPham) {
            $SanPham->increments('idSanPham');
            $SanPham->string('nameSanPham', 100);
            $SanPham->float('gia_SP', 8, 2);
            $SanPham->text('anh');
            $SanPham->float('SoLuong', 8, 2);
            $SanPham->unsignedInteger('idTrangthaiSanPham');
            $SanPham->unsignedInteger('idDanhmuc');
            $SanPham->foreign('idDanhmuc')->references('idDanh_Muc')->on('DanhMuc');
            $SanPham->foreign('idTrangthaisanPham')->references('idTrangThai_SanPham')->on('TrangThaiSanPham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('SanPham');
    }
}
