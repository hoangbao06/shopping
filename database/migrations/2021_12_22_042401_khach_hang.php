<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KhachHang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User', function (Blueprint $Khachhang) {
            $Khachhang->increments('idKhachhang');
            $Khachhang->string('nameKhachhang', 100);
            $Khachhang->string('email', 100);
            $Khachhang->string('passWord', 50);
            $Khachhang->date('DoB');
            $Khachhang->boolean('gioiTinh')->nullable();
            $Khachhang->text('diaChi');
            $Khachhang->char('sdt', 10)->nullable();
            $Khachhang->unsignedInteger('Loaikhachhang');
            $Khachhang->unsignedInteger('id_thanhpho');
            $Khachhang->unsignedInteger('id_quan');
            $Khachhang->unsignedInteger('id_phuong');
            $Khachhang->foreign('Loaikhachhang')->references('idPhanLoai')->on('phanLoaiKhachHang');
            $Khachhang->foreign('id_thanhpho')->references('idThanhPho')->on('ThanhPho');
            $Khachhang->foreign('id_quan')->references('idQuan')->on('Quan');
            $Khachhang->foreign('id_phuong')->references('idPhuong')->on('Phuong');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
    }
}
