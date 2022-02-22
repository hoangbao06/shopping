<?php

namespace App\Http\Controllers;

use App\Models\AnhSanPham;
use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\TrangThaiSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $SanPham = SanPham::join('trangthaisanpham', 'sanpham.idTrangthaiSanPham', '=', 'trangthaisanpham.idTrangThai_SanPham')
            ->join('danhmuc', 'sanpham.idDanhmuc', '=', 'danhmuc.idDanh_Muc')->where('nameSanPham', 'like', "%$search%")->paginate(5);
        return view('SanPham.index', [
            'sanpham' => $SanPham,
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
        $Trangthai = TrangThaiSanPham::all();
        $danhMuc = DanhMuc::all();
        return view('SanPham.create', [
            "Trangthai" => $Trangthai,
            "danhmuc" => $danhMuc
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
        $name = $request->get('Ten_San_Pham');
        $giaSP = $request->get('gia_san_pham');
        $soluong = $request->get('So_Luong_SP');
        $danhMuc = $request->get('Danh_Muc');
        $trangthai = $request->get('Trang_thai');

        $anh = $request->file('anh_SP');
        $folder = 'assets/image';
        $nameImage = $anh->getClientOriginalName();
        $anh->move($folder, $nameImage);

        $SanPham = new SanPham();
        $SanPham->nameSanPham = $name;
        $SanPham->gia_SP = $giaSP;
        $SanPham->anh = $folder . '/' . $nameImage;
        $SanPham->SoLuong = $soluong;
        $SanPham->idTrangthaiSanPham  = $trangthai;
        $SanPham->idDanhmuc = $danhMuc;
        $SanPham->save();
        return Redirect::route('SanPham.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $anhSanPham = AnhSanPham::all()->where('id_SanPham', '=', $id);
        $idSanPham = $id;
        return view('SanPham.detail', [
            'anhSanPham' => $anhSanPham,
            'idSanPham' => $idSanPham

        ]);
        return view('SanPham.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $SanPham = SanPham::find($id);
        $Trangthai = TrangThaiSanPham::all();
        $danhMuc = DanhMuc::all();
        return view('SanPham.edit', [
            "sanpham" => $SanPham,
            "TrangThai" => $Trangthai,
            "danhmuc" => $danhMuc
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
        $name = $request->get('Sua_ten_SP');

        $anh = $request->file('Sua_anh_SP');

        $gia = $request->get('Sua_gia_SP');
        $SoLuong = $request->get('Sua_soluong_SP');
        $trangthai = $request->get('Sua_Trangthai_SP');

        $SanPham = SanPham::find($id);
        $folder = 'assets/image';
        $nameImage = $anh->getClientOriginalName();
        $anh->move($folder, $nameImage);

        $SanPham->nameSanPham = $name;
        $SanPham->gia_SP = $gia;
        $SanPham->SoLuong = $SoLuong;
        $SanPham->idTrangthaiSanPham = $trangthai;

        $SanPham->anh = $folder . '/' . $nameImage;
        $SanPham->save();
        return Redirect::route('SanPham.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SanPham::find($id)->delete();
        return Redirect::route('SanPham.index');
    }
}
