<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NhapKho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NhaptKho', function (Blueprint $NhapKho) {
            $NhapKho->increments('idNhapKho');
            $NhapKho->unsignedInteger('id_San_Pham2');
            $NhapKho->date('NgayNhapKho');
            $NhapKho->float('SoLuong_NK', 8, 2);
            $NhapKho->unsignedInteger('id_tinhtrang2');
            $NhapKho->foreign('id_San_Pham2')->references('idSanPham')->on('SanPham');
            $NhapKho->foreign('id_tinhtrang2')->references('idTinhTrangXuatNhap')->on('TinhTrangXuatNhap');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('NhaptKho');
    }
}
