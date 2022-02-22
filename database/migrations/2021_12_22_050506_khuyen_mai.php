<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KhuyenMai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khuyenMaiKhachHang', function (Blueprint $Khuyenmai) {
            $Khuyenmai->increments('idKhuyenMai');
            $Khuyenmai->string('MakhuyenMai');
            $Khuyenmai->string('nameKhuyenMai');
            $Khuyenmai->integer('phanTramGiamGia');
            $Khuyenmai->integer('solanKhuyenMai');
            $Khuyenmai->unsignedInteger('idPhanLoaikhachhang');
            $Khuyenmai->foreign('idPhanLoaikhachhang')->references('idPhanLoai')->on('phanLoaiKhachHang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('KhuyenMaiKhachHang');
    }
}
