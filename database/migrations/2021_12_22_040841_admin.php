<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Admin', function (Blueprint $Admin) {
            $Admin->increments('idNhanVien');
            $Admin->string('nameNhanVien', 100);
            $Admin->string('email', 100);
            $Admin->string('passWord', 50);
            $Admin->unsignedInteger('idchucvu');
            $Admin->foreign('idchucvu')->references('idChucVu')->on('chucvu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Admin');
    }
}
