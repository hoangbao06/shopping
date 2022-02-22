<?php

namespace App\Http\Controllers;

use App\Models\KhoHang;
use App\Models\SanPham;
use App\Models\TrangThaiSanPham;
use App\Models\XuatKho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KhoHangcontronller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $KhoHang = KhoHang::join('sanpham', 'sanpham.idSanPham', '=', 'khohang.id_San_Pham3')
            ->join('trangthaisanpham', 'trangthaisanpham.idTrangThai_SanPham', '=', 'khohang.id_Trang_thai2')
            ->where('nameSanPham', 'like', "%$search%")->paginate(5);
        // ->whereNull('khohang.id_Trang_Thai2')
        // $KhoHang = KhoHang::join('trangthaisanpham', 'trangthaisanpham.idTrangThai_SanPham', '=', 'khohang.id_Trang_thai2')->get();
        // $KhoHang = KhoHang::join('sanpham', 'sanpham.idSanPham', '=', 'khohang.id_San_Pham3')->get();


        return view('KhoHang.index', [
            "listkhohang" =>  $KhoHang,
            'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trangthai = TrangThaiSanPham::all();
        $SanPham = SanPham::all();
        $XuatKho = XuatKho::all();
        $KhoHang = KhoHang::all();
        // $KhoHang = KhoHang::join('sanpham', 'sanpham.idSanPham', '=', 'khohang.id_San_Pham3')
        //     ->join('trangthaisanpham', 'trangthaisanpham.idTrangThai_SanPham', '=', 'khohang.id_Trang_thai2')
        //     ->join('nhaptkho', 'nhaptkho.idKhoHang', '=', 'khohang.id_nhapkho')
        //     ->join('xuatkho', 'xuatkho.idXuatKho', '=', 'khohang.id_xuatkho');
        return view('KhoHang.create', [
            "nhapkho" => $KhoHang,
            "xuatkho" => $XuatKho,
            "sanpham" => $SanPham,
            "trangthai" => $trangthai
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
        $idSP = $request->get('ID_SP_KH');
        $idTT = $request->get('ID_TT_KH');
        $So_Luong = $request->get('So_Luong_KH');
        $KhoHang = new KhoHang();
        // $TinhTrang = TinhTrangXuatNhap::find($id);
        // $SanPham = SanPham::find($id);
        // $KhoHang = KhoHang::find($id);
        $KhoHang->id_San_Pham3  = $idSP;
        $KhoHang->SoLuong_KH = $So_Luong;
        $KhoHang->id_Trang_thai2 = $idTT;
        $KhoHang->save();
        return Redirect::route('KhoHang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trangthai = TrangThaiSanPham::all();
        $khohang = KhoHang::where('idKhoHang', '=', $id)->first();
        // $SanPham = SanPham::all();
        // return $khohang;
        return view('KhoHang.edit', [
            // "sanpham" => $SanPham,
            "khohang" => $khohang,
            "trangthai" => $trangthai
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
        $Sua_Trang_thai = $request->get('Sua_TrangThai');
        $Sua_So_Luong = $request->get('Sua_So_Luong');
        $KhoHang = KhoHang::find($id);
        $KhoHang->SoLuong_KH = $Sua_So_Luong;
        $KhoHang->id_Trang_thai2  = $Sua_Trang_thai;
        $KhoHang->save();
        return Redirect::route('KhoHang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KhoHang::find($id)->delete();
        return Redirect::route('KhoHang.index');
    }
}
