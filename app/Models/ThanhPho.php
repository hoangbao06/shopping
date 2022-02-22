<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThanhPho extends Model
{
    use HasFactory;
    protected $table = 'thanhpho';
    public $primaryKey = 'idThanhPho';
    public $timestamps = false;
}
