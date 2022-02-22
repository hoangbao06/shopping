<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewAdmin extends Controller
{
    public function viewAdmin()
    {
        return view('admin.overview');
    }
}
