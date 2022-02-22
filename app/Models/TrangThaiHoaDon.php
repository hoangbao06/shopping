<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrangThaiHoaDon extends Model
{
    use HasFactory;
    protected $table = 'trangthaihoadon';
    public $primaryKey = 'idTrangThai';
    public $timestamps = false;
}
