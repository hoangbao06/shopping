<?php

namespace App\Http\Controllers;

use App\Models\HoaDonChiTiet;
use App\Models\KhachHang;
use Illuminate\Http\Request;

class lichsudonhang extends Controller
{
    public function LichSuHoaDon(Request $request)
    {
        $idKhachHang = $request->get("id_Khach_hang1");
        // SELECT * FROM `hoadonchitiet` INNER JOIN sanpham ON sanpham.idSanPham = hoadonchitiet.id_San_Pham 
        // INNER join hoadon on hoadonchitiet.id_Hoadon = hoadon.idHoadon 
        // INNER JOIN trangthaihoadon on hoadon.idTrangThaiHoaDon = trangthaihoadon.idTrangThai
        $LichSuMuaHang = HoaDonChiTiet::join('sanpham', 'sanpham.idSanPham', '=', 'hoadonchitiet.id_San_Pham')
            ->join('hoadon', 'hoadonchitiet.id_Hoadon', '=', 'hoadon.idHoadon')
            ->join('trangthaihoadon', 'hoadon.idTrangThaiHoaDon', '=', 'trangthaihoadon.idTrangThai')
            ->where('idTrangThaiHoaDon', '=', 3)->where('id_Khachhang1', '=', $idKhachHang)->paginate(5);
        // $KhachHang = KhachHang::where('idKhachhang', '=', $idKhachHang)->first();
        // return $KhachHang;
        return view('HoaDon.LichSuHoaDon', [
            'lichsumuahang' =>  $LichSuMuaHang,
        ]);
    }
}
