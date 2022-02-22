<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AnhSanPham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AnhSanPham', function (Blueprint $picture) {
            $picture->increments('idAnh');
            $picture->unsignedInteger('id_SanPham');
            $picture->text('anhsanPham');
            $picture->foreign('id_SanPham')->references('idSanPham')->on('SanPham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('AnhSanPham');
    }
}
