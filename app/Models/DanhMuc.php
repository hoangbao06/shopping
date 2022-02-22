<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;
    protected $table = 'danhmuc';
    public $primaryKey = 'idDanh_Muc';
    public $timestamps = false;
}
