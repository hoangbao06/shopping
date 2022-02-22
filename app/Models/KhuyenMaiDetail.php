<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuyenMaiDetail extends Model
{
    use HasFactory;
    protected $table = 'khuyenmaideatil';
    public $primaryKey = 'idKhuyenMaiDetail';
    public $timestamps = false;
}
