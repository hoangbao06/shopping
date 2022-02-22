<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\PhanLoaiKhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function Register()
    {
        return view('Register');
    }

    public function test()
    {
    }


    public function dangkyProcess(Request $request)
    {

        $PhanLoai = PhanLoaiKhachHang::all();
        $tenKhachHang = $request->get('ten');
        $email = $request->get('email');
        $matkhau = $request->get('pass');
        $sdt = $request->get('sdt');
        $diachi = $request->get('diachi');



        // return $tenKhachHang;
        $khachhang = new KhachHang();

        $khachhang->nameKhachhang = $tenKhachHang;
        $khachhang->email = $email;
        $khachhang->passWord = $matkhau;
        $khachhang->sdt = $sdt;
        $khachhang->diaChi = $diachi;
        $khachhang->Loaikhachhang = 1;
        $khachhang->save();
        return view('User.loginUser');
    }
}
