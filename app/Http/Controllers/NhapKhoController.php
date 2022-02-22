<?php

namespace App\Http\Controllers;

use App\Models\KhoHang;
use App\Models\NhapKho;
use App\Models\SanPham;
use App\Models\TinhTrangXuatNhap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class NhapKhoController extends Controller
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
        $NhapKho = NhapKho::join('tinhtrangxuatnhap', 'tinhtrangxuatnhap.idTinhTrangXuatNhap', '=', 'nhaptkho.id_tinhtrang2')
            ->join('sanpham', 'sanpham.idSanPham', '=', 'nhaptkho.id_San_Pham2')
            ->where('nameSanPham', 'like', "%$search%")->paginate(5);
        return view('NhapKho.index', [
            "listnhapkho" =>  $NhapKho,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $TinhTrang = TinhTrangXuatNhap::all();
        $SanPham = SanPham::all();
        $NhapKho = NhapKho::join('tinhtrangxuatnhap', 'tinhtrangxuatnhap.idTinhTrangXuatNhap', '=', 'nhaptkho.id_tinhtrang2')
            ->join('sanpham', 'sanpham.idSanPham', '=', 'nhaptkho.id_San_Pham2');
        // return $SanPham;
        // return $TinhTrang;
        return view('NhapKho.create', [
            "nhapkho" => $NhapKho,
            "sanpham" => $SanPham,
            "tinhtrang" => $TinhTrang

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
        $idSP = $request->get('San_Pham');
        $id_Tinh_trang = $request->get('ID_Tinh_trang');
        $Ngay_Nhap = $request->get('Ngay_Nhap');
        $So_Luong = $request->get('So_Luong');
        $NhapKho = new NhapKho();
        // $TinhTrang = TinhTrangXuatNhap::find($id);
        // $SanPham = SanPham::find($id);
        // $NhapKho = NhapKho::find($id);
        $NhapKho->id_San_Pham2  = $idSP;
        $NhapKho->SoLuong_NK  = $So_Luong;
        $NhapKho->id_tinhtrang2 = $id_Tinh_trang;
        $NhapKho->NgayNhapKho = $Ngay_Nhap;
        $NhapKho->save();
        $KhoHang = KhoHang::where('id_San_Pham3', '=', $idSP)->first();


        if ($KhoHang == null) {
            $KhoHangMoi = new KhoHang();
            $KhoHangMoi->SoLuong_KH = $So_Luong;
            $KhoHangMoi->id_San_Pham3 = $idSP;
            $KhoHangMoi->id_Trang_Thai2 = NULL;
            $KhoHangMoi->save();
        } else {
            $soLuongHienTai = $KhoHang->SoLuong_KH;
            $tongSoLuong = $soLuongHienTai + $So_Luong;
            $KhoHang->SoLuong_KH = $tongSoLuong;
            $KhoHang->save();
        }




        // $soLuongKH =  $KhoHang->SoLuong_KH;

        // $TongSoLuong =  $soLuongKH + $So_Luong;

        // $KhoHang->SoLuong_KH = $TongSoLuong;
        // $KhoHang->save();

        return Redirect::route('NhapKho.index');
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
        $NhapKho = NhapKho::where('idNhapKho', '=', $id)->first();
        return view('NhapKho.edit', [
            "nhapkho" => $NhapKho,
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
        $Sua_Tinh_Trang = $request->get('Sua_TinhTrang');
        $Sua_So_Luong = $request->get('Sua_So_Luong');
        $Sua_Ngay_Nhap = $request->get('Sua_Ngay_Nhap');
        $NhapKho = NhapKho::find($id);
        $NhapKho->SoLuong_NK = $Sua_So_Luong;
        $NhapKho->NgayNhapKho =  $Sua_Ngay_Nhap;
        $NhapKho->id_tinhtrang2  = $Sua_Tinh_Trang;
        $NhapKho->save();
        return Redirect::route('NhapKho.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NhapKho::find($id)->delete();
        return Redirect::route('NhapKho.index');
    }
}
