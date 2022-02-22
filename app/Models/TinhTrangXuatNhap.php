<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinhTrangXuatNhap extends Model
{
    use HasFactory;
    protected $table = 'tinhtrangxuatnhap';
    public $primaryKey = 'idTinhTrangXuatNhap';
    public $timestamps = false;
}
