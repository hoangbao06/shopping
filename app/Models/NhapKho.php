<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhapKho extends Model
{
    use HasFactory;
    protected $table = 'nhaptkho';
    public $primaryKey = 'idNhapKho';
    public $timestamps = false;
}
