<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuyenMaiKhachHang extends Model
{
    use HasFactory;
    protected $table = 'khuyenmaikhachhang';
    public $primaryKey = 'idKhuyenMai';
    public $timestamps = false;
}
