<?php

namespace App\Http\Controllers;

use App\Models\HoaDonChiTiet;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class tangGiamSoLuongSanPhamGioHang extends Controller
{
    public function tangSoLuongSanPham(Request $request)
    {

        $idHoaDonChiTiet = $request->get("idHoaDonChiTiet");
        $hoaDonChiTiet = HoaDonChiTiet::where('idHoaDonChiTiet', '=', $idHoaDonChiTiet)->first();

        // Cộng số lượng sản phẩm 
        $SoLuongDaCo = $hoaDonChiTiet->SoLuong_HDCT;
        $soLuongThemVao = $SoLuongDaCo + 1;
        $hoaDonChiTiet->SoLuong_HDCT = $soLuongThemVao;
        // return  $soLuongThemVao;
        // giá Sản Phẩm 
        $idSanPham = $hoaDonChiTiet->id_San_Pham;
        $sanPham = SanPham::where('idSanPham', '=', $idSanPham)->first();
        $giaSanPham = $sanPham->gia_SP;
        // return $giaSanPham;
        //lấy giá Sản Phẩm Mới
        $hoaDonChiTiet->TongTien = $giaSanPham * $soLuongThemVao;
        $hoaDonChiTiet->save();
        $idKhachHang = $hoaDonChiTiet->id_Khachhang1;
        $hoaDonChiTiet->save();
        $idKhachHang = $hoaDonChiTiet->id_Khachhang1;
        return Redirect::route('HoaDonChiTiet.index', ['id_khach_hang' => $idKhachHang]);
    }

    public function giamSoLuongSanPham(Request $request)
    {

        $idHoaDonChiTiet = $request->get("idHoaDonChiTiet");
        $hoaDonChiTiet = HoaDonChiTiet::where('idHoaDonChiTiet', '=', $idHoaDonChiTiet)->first();


        // lấy giá tiền của sản phẩm
        $idSanPham = $hoaDonChiTiet->id_San_Pham;
        $sanPham = SanPham::where('idSanPham', '=', $idSanPham)->first();
        $giaSanPham = $sanPham->gia_SP;



        // trừ số lượng và cập nhật tổng tiền
        $SoLuonghientai = $hoaDonChiTiet->SoLuong_HDCT;
        $soLuongMoi = $SoLuonghientai - 1;
        $hoaDonChiTiet->SoLuong_HDCT = $soLuongMoi;

        // cập nhật tổng tiền
        $hoaDonChiTiet->TongTien = $giaSanPham * $soLuongMoi;
        $hoaDonChiTiet->save();
        $idKhachHang = $hoaDonChiTiet->id_Khachhang1;
        return Redirect::route('HoaDonChiTiet.index', ['id_khach_hang' => $idKhachHang]);
    }
}
