<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoHang extends Model
{
    use HasFactory;
    protected $table = 'khohang';
    public $primaryKey = 'idKhoHang';
    public $timestamps = false;
}
