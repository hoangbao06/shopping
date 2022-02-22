<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\TryCatch;

class authenticateController extends Controller
{
    public function loginAdmin()
    {
        return view('loginAdmin');
    }

    public function loginProcess(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        try {
            $admin = Admin::where('email', $email)->where('password', $password)->firstOrfail();
            $request->session()->put('id', $admin->idNhanVien);
            $request->session()->put('name', $admin->nameNhanVien);
            // return Redirect::route("admin.overview");
            return view('admin.overview');
            echo "thanh cong";
        } catch (Exception $i) {
            return Redirect::route("loginAdmin")->with('error', [
                "message" => 'sai email hoặc mật khẩu',
                "email" => $email,
            ]);
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return Redirect::route("loginAdmin");
    }
}
