<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class authenticateUser extends Controller
{
    public function LoginUser()
    {
        return view('User.loginUser');
    }

    public function loginProcessUser(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        try {
            $KhachHang = KhachHang::where('email', $email)->where('password', $password)->firstOrfail();
            $request->session()->put('idUser', $KhachHang->idKhachhang);
            $request->session()->put('nameUser', $KhachHang->nameKhachhang);
            // return Redirect::route("admin.overview");
            return Redirect::route("TrangChuView");
        } catch (Exception $i) {
            return Redirect::route("loginUser")->with('error', [
                "message" => 'sai email hoặc mật khẩu',
                "email" => $email,
            ]);
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return Redirect::route("TrangChuView");
    }
}
