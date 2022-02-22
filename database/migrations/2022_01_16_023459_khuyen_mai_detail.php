<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KhuyenMaiDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khuyenMaiDeatil', function (Blueprint $KhuyenMaiDetail) {
            $KhuyenMaiDetail->increments('idKhuyenMaiDetail');
            $KhuyenMaiDetail->date('NgaySuDung');
            $KhuyenMaiDetail->unsignedInteger('idkhachhang');
            $KhuyenMaiDetail->foreign('idkhachhang')->references('idKhachhang')->on('User');
            $KhuyenMaiDetail->unsignedInteger('idKhuyenMai2');
            $KhuyenMaiDetail->foreign('idKhuyenMai2')->references('idKhuyenMai')->on('khuyenMaiKhachHang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('khuyenMaiDeatil');
    }
}
