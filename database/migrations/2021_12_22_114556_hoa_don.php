<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HoaDon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HoaDon', function (Blueprint $bill) {
            $bill->increments('idHoadon');
            $bill->string('nameHoaDon', 100);
            $bill->date('ngayDat');
            $bill->string('ghiChu', 50);
            $bill->float('thanhtien', 8, 2);
            $bill->unsignedInteger('idKhach_hang');
            $bill->unsignedInteger('idTrangThaiHoaDon');
            $bill->unsignedInteger('Ma_khuyen_mai');
            $bill->foreign('idKhach_hang')->references('idKhachhang')->on('User');
            $bill->foreign('idTrangThaiHoaDon')->references('idTrangThai')->on('TrangThaiHoaDon');
            $bill->foreign('Ma_khuyen_mai')->references('idKhuyenMai')->on('khuyenMaiKhachHang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('HoaDon');
    }
}
