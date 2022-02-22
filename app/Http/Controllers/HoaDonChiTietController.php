<?php

namespace App\Http\Controllers;

use App\Models\HoaDonChiTiet;
use App\Models\KhachHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HoaDonChiTietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $idKhachHang = $request->get("id_khach_hang");
        // SELECT * FROM `hoadonchitiet` INNER JOIN sanpham on sanpham.idSanPham = hoadonchitiet.id_San_Pham 
        // INNER JOIN user ON user.idKhachhang = hoadonchitiet.id_Khachhang1

        //Tính Tổng Hóa Đơn Nhỏ
        // $HoaDonChiTiet = HoaDonChiTiet::SUM(['TongTien'])->WHERE('id_hoadon', '=', NULL)->WHERE('id_Khachhang1', '=', $idKhachHang);
        $TongTien = HoaDonChiTiet::whereNull('id_Hoadon')
            ->where('id_Khachhang1', '=', $idKhachHang)
            ->sum('TongTien');


        $HoaDonChiTiet = HoaDonChiTiet::join('sanpham', 'sanpham.idSanPham', '=', 'hoadonchitiet.id_San_Pham')
            ->join('user', 'user.idKhachhang', '=', 'hoadonchitiet.id_Khachhang1')->where('hoadonchitiet.id_Khachhang1', '=', $idKhachHang)->whereNull('id_Hoadon')->get();
        return view('giohang', [
            'hoadonchitiet' => $HoaDonChiTiet,
            'tongTienHoaDon' => $TongTien

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // đoạn này này là lấy thông tin về sản phẩm ví dụ như là id sản phẩm , số lượng , ...
        $idSanPham = $request->get('id_sanPham');
        $gia_SP =  $request->get('gia_san_pham');
        $SoLuong = $request->get('so_Luong');
        $idkhachhang = $request->get('id_KhachHang');
        $tongtien = $SoLuong * $gia_SP;

        // tiếp theo chúng ta sẽ kiểm tra xem sản phẩm đó đã tồn tại trong giỏ hàng chưa ?

        // kiểm tra bằng id sản phẩm
        $HoaDonChiTiet = HoaDonChiTiet::whereNull('id_Hoadon')->where('id_San_Pham', '=', $idSanPham)->get();
        $size = count($HoaDonChiTiet);
        if ($size == 0) {
            $HoaDonChiTiet = new HoaDonChiTiet();
            $HoaDonChiTiet->id_San_Pham = $idSanPham;
            $HoaDonChiTiet->SoLuong_HDCT = $SoLuong;
            $HoaDonChiTiet->id_Khachhang1 = $idkhachhang;
            $HoaDonChiTiet->TongTien = $tongtien;
            $HoaDonChiTiet->save();
            return redirect::route('ChiTietSanPham.index', ['idSanPham' => $idSanPham]);
        } else {
            $HoaDonChiTiet = HoaDonChiTiet::where('id_San_Pham', '=', $idSanPham)->first();

            // cập nhật số lượng 
            $soluonghientai = $HoaDonChiTiet->SoLuong_HDCT;
            $tongSL = $soluonghientai + $SoLuong;
            $HoaDonChiTiet->SoLuong_HDCT = $tongSL;

            //cập nhật tổng tiền hóa đơn chi tiết
            $sanPham = SanPham::where('idSanPham', '=', $idSanPham)->first();
            $giaSanPham = $sanPham->gia_SP;

            $tongTien = $giaSanPham * $tongSL;
            $HoaDonChiTiet->TongTien = $tongTien;


            $HoaDonChiTiet->save();
            return redirect::route('ChiTietSanPham.index', ['idSanPham' => $idSanPham]);
        }
        // cập nhật số lượng 
        // $HoaDonChiTiet->save();
        // return redirect::route('ChiTietSanPham.index', ['idSanPham' => $idSanPham]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HoaDonChiTiet::find($id)->delete();
        return Redirect::route('HoaDonChiTiet.index');
    }
}
