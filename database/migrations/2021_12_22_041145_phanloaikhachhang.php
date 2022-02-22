<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Phanloaikhachhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phanLoaiKhachHang', function (Blueprint $quyen) {
            $quyen->increments('idPhanLoai');
            $quyen->string('namePhanLoai', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('phanLoaiKhachHang');
    }
}
