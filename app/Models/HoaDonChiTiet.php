<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonChiTiet extends Model
{
    use HasFactory;
    protected $table = 'hoadonchitiet';
    public $primaryKey = 'idHoaDonChiTiet';
    public $timestamps = false;
}
