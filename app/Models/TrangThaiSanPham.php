<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrangThaiSanPham extends Model
{
    use HasFactory;
    protected $table = 'trangthaisanpham';
    public $primaryKey = 'idTrangThai_SanPham';
    public $timestamps = false;
}
