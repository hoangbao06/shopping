<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanLoaiKhachHang extends Model
{
    use HasFactory;
    protected $table = 'phanloaikhachhang';
    public $primaryKey = 'idPhanLoai';
    public $timestamps = false;
}
