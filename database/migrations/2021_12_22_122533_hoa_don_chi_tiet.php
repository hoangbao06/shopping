<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HoaDonChiTiet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HoaDonChiTiet', function (Blueprint $bill_detail) {
            $bill_detail->increments('idHoaDonChiTiet');
            $bill_detail->unsignedInteger('id_Hoadon');
            $bill_detail->unsignedInteger('id_San_Pham');
            $bill_detail->unsignedInteger('id_Khachhang1');
            $bill_detail->string('SoLuong_HDCT');
            $bill_detail->float('TongTien', 8, 2);
            $bill_detail->foreign('id_Khachhang1')->references('idKhachhang')->on('User');
            $bill_detail->foreign('id_Hoadon')->references('idHoadon')->on('HoaDon');
            $bill_detail->foreign('id_San_Pham')->references('idSanPham')->on('SanPham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('HoaDonChiTiet');
    }
}
