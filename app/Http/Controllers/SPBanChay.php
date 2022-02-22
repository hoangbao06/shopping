<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SPBanChay extends Controller
{
    public function SPBanChay()
    {
        // $thongKe1 = DB::select(DB::raw(" SELECT month(ngayDat) AS thongkethang,SUM(thanhtien) 
        // as tongTien FROM `hoadon` WHERE idTrangThaiHoaDon = 3 AND year(ngayDat) = 2022 GROUP BY (thongkethang)"));

        // $obj = json_decode(json_encode($thongKe1), FALSE);


        $SPbanchay = DB::select(DB::raw(" SELECT sanpham.nameSanPham,SUM(SoLuong_HDCT) as SoLuong_HDCT FROM `hoadonchitiet` INNER JOIN sanpham ON sanpham.idSanPham = hoadonchitiet.id_San_Pham GROUP BY (sanpham.nameSanPham) ORDER BY SUM(SoLuong_HDCT) DESC "));

        $obj = json_decode(json_encode($SPbanchay), FALSE);


        return view('ThongKe.SPbanchay', [
            'SPbanchay' => $obj
        ]);
    }
}
