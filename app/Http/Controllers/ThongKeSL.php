<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use App\Models\LietKeDoanhSoThang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnValue;

class ThongKeSL extends Controller
{
    public function ThongKeSLnam()
    {

        // SELECT year(hoadon.ngayDat) AS ngayThanhToan,COUNT(hoadonchitiet.SoLuong_HDCT) 
        // AS soLuongSanPham FROM `hoadonchitiet` INNER join hoadon 
        // on hoadon.idHoadon = hoadonchitiet.id_Hoadon WHERE idTrangThaiHoaDon = '3' GROUP BY (ngayThanhToan)

        // HoaDon::join('hoadonchitiet', 'hoadonchitiet.id_Hoadon', '=', 'hoadon.idHoadon')
        //     ->join('sanpham', 'idSanPham', '=', 'id_San_Pham')
        //     ->WHEREYear('ngayDat', '2022')->where('idTrangThaiHoaDon', '=', 3)->get();

        $thongKeNam = HoaDon::whereyear('ngayDat',  '2022')->where('idTrangThaiHoaDon', '=', '3')->sum('thanhtien');

        // tổng tiền hàng tháng 
        // SELECT month(ngayDat) AS thongkethang,SUM(thanhtien) 
        // FROM `hoadon` WHERE idTrangThaiHoaDon = 3 AND year(ngayDat) = 2022 GROUP BY (thongkethang)


        $thongKe1 = DB::select(DB::raw(" SELECT month(ngayDat) AS thongkethang,SUM(thanhtien) 
        as tongTien FROM `hoadon` WHERE idTrangThaiHoaDon = 3 AND year(ngayDat) = 2022 GROUP BY (thongkethang)"));
        // return $thongKe1;

        $obj = json_decode(json_encode($thongKe1), FALSE);


        // $myArray = [];

        // for ($i = 1; $i < 13; $i++) {
        //     foreach ($thongKe1 as $a) {
        //         $k = new LietKeDoanhSoThang();
        //         if ($i == $a['thongkethang']) {
        //             $k->tenThang = $i;
        //             $k->tongTien = $a['tongTien'];
        //             $myArray[] = $k;
        //         } else {
        //             $k->tenThang = $i;
        //             $k->tongTien = 0;
        //             $myArray[] = $k;
        //         }
        //     }
        // }


        return view('ThongKe.indexSL', [
            'thongkenam' => $thongKeNam,
            'thongKe1' => $obj
        ]);
        // return $myArray;
    }
}
