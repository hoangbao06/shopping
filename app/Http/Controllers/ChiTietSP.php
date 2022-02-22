<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class ChiTietSP extends Controller
{
    public function ChiTietSP(Request $request)
    {
        $sanPham = $request->get('sanpham');
        $chiTietSanPham = SanPham::join('danhmuc', 'sanpham.idDanhmuc', '=', 'danhmuc.idDanh_Muc')->where('nameSanPham', '=', $sanPham)->first();
        // return $chiTietSanPham;
        return view('ThongKe.ChiTietSP', [
            'chitietSP' => $chiTietSanPham
        ]);
    }
}
