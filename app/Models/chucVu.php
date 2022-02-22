<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chucVu extends Model
{
    use HasFactory;
    protected $table = 'chucvu';
    public $primaryKey = 'idChucVu';
    public $timestamps = false;
}
