<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quan extends Model
{
    use HasFactory;
    protected $table = 'quan';
    public $primaryKey = 'idQuan';
    public $timestamps = false;
}
