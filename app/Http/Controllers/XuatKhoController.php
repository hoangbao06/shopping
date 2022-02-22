<?php

namespace App\Http\Controllers;

use App\Models\KhoHang;
use App\Models\SanPham;
use App\Models\TinhTrangXuatNhap;
use App\Models\XuatKho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class XuatKhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        // SELECT * FROM `nhaptkho`INNER join tinhtrangxuatnhap on tinhtrangxuatnhap.idTinhTrangXuatNhap = nhaptkho.id_tinhtrang2 
        // INNER JOIN sanpham on sanpham.idSanPham = nhaptkho.id_San_Pham2
        $XuatKho = XuatKho::join('tinhtrangxuatnhap', 'tinhtrangxuatnhap.idTinhTrangXuatNhap', '=', 'xuatkho.id_tinhtrang')
            ->join('sanpham', 'sanpham.idSanPham', '=', 'xuatkho.id_San_Pham')
            ->where('nameSanPham', 'like', "%$search%")->paginate(5);
        return view('XuatKho.index', [
            "listXuatkho" =>  $XuatKho,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $idKhoHang = $request->get("idKhoHang");
        $idSanPham = $request->get("idSanPham");
        $KhoHang = KhoHang::all();
        $TinhTrang = TinhTrangXuatNhap::all();
        $SanPham = SanPham::all();
        $XuatKho = XuatKho::join('tinhtrangxuatnhap', 'tinhtrangxuatnhap.idTinhTrangXuatNhap', '=', 'xuatkho.id_tinhtrang')
            ->join('sanpham', 'sanpham.idSanPham', '=', 'xuatkho.id_SanPham');
        return view('XuatKho.create', [
            "xuatkho" => $XuatKho,
            "sanpham" => $SanPham,
            "tinhtrang" => $TinhTrang,
            "khohang" => $KhoHang,
            "idKhoHang" => $idKhoHang,
            "idSanPham" => $idSanPham
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idSP = $request->get('idSanPham');
        $id_Tinh_trang = $request->get('ID_Tinh_trang');
        $Ngay_Nhap = $request->get('Ngay_Nhap');
        $So_Luong = $request->get('So_Luong');
        $id_khoHang = $request->get('idKhoHang');
        $XuatKho = new XuatKho();
        $SanPham = SanPham::all();
        $XuatKho->id_San_Pham = $idSP;
        $XuatKho->soluong_XK  = $So_Luong;
        $XuatKho->id_tinhtrang  = $id_Tinh_trang;
        $XuatKho->NgayXuatKho = $Ngay_Nhap;
        $XuatKho->id_KhoHang = $id_khoHang;
        $XuatKho->save();

        // $KhoHang = KhoHang::where('id_San_Pham3', '=', $idSP)->first();



        $KhoHangMoi = KhoHang::find($id_khoHang);
        $soLuongTrongKho =  $KhoHangMoi->SoLuong_KH;
        $soLuongSanPhamLayRa = $So_Luong;
        $ketQua =  $soLuongTrongKho - $soLuongSanPhamLayRa;
        $KhoHangMoi->SoLuong_KH = $ketQua;
        $KhoHangMoi->save();

        $SanPham = SanPham::find($idSP);
        $soluonghientaiSP = $SanPham->SoLuong;
        $tongSoluongSP = $soluonghientaiSP + $soLuongSanPhamLayRa;
        $SanPham->SoLuong = $tongSoluongSP;

        $SanPham->Save();


        return Redirect::route('XuatKho.index');
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
        $TinhTrang = TinhTrangXuatNhap::all();
        $SanPham = SanPham::find($id);
        $XuatKho = XuatKho::where('idXuatKho', '=', $id)->first();
        return view('XuatKho.edit', [
            "xuatkho" =>  $XuatKho,
            "sanpham" => $SanPham,
            "tinhtrang" => $TinhTrang
        ]);
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
        $Sua_Tinh_Trang = $request->get('Sua_TinhTrang2');
        $Sua_So_Luong = $request->get('Sua_So_Luong2');
        $Sua_Ngay_Xuat = $request->get('Sua_Ngay_Xuat');
        $XuatKho = XuatKho::find($id);
        $XuatKho->soluong_XK = $Sua_So_Luong;
        $XuatKho->NgayXuatKho =  $Sua_Ngay_Xuat;
        $XuatKho->id_tinhtrang  = $Sua_Tinh_Trang;
        $XuatKho->save();
        return Redirect::route('XuatKho.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        XuatKho::find($id)->delete();
        return Redirect::route('XuatKho.index');
    }
}
