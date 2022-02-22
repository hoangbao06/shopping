<?php

namespace App\Http\Controllers;

use App\Models\AnhSanPham;
use App\Models\KhachHang;
use App\Models\SanPham;
use Illuminate\Http\Request;

class TrangChuController extends Controller
{
    public function trangChu(Request $request)
    {
        // $khachHang = KhachHang::all();
        $search = $request->get('search');
        $SanPham = SanPham::join('trangthaisanpham', 'sanpham.idTrangthaiSanPham', '=', 'trangthaisanpham.idTrangThai_SanPham')
            ->join('danhmuc', 'sanpham.idDanhmuc', '=', 'danhmuc.idDanh_Muc')->where('nameSanPham', 'like', "%$search%")->paginate(5);
        // 
        return view('TrangChu', [
            'sanpham' => $SanPham,
            'search' => $search,
            // 'KhachHang' => $khachHang
        ]);
    }
}
