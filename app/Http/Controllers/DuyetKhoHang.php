<?php

namespace App\Http\Controllers;

use App\Models\KhoHang;
use App\Models\TrangThaiSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DuyetKhoHang extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $duyetkhohang = KhoHang::join('sanpham', 'sanpham.idSanPham', '=', 'khohang.id_San_Pham3')
            ->join('trangthaisanpham', 'trangthaisanpham.idTrangThai_SanPham', '=', 'khohang.id_Trang_thai2')
            ->whereNull('khohang.id_Trang_Thai2')->paginate(5);
        return view('DuyetKhoHang.index', [
            "listkhohang" =>  $duyetkhohang,
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
        //
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
        $duyetkhohang = KhoHang::find($id);
        $trangthai = TrangThaiSanPham::all();
        return view('DuyetKhoHang.edit', [
            'trangthai' => $trangthai,
            'duyetkhohang' => $duyetkhohang
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


        $id_trangthai = $request->get('ID_TT_KH2');
        $duyetkhohang = KhoHang::find($id);
        // $duyetkhohang = new KhoHang();
        $duyetkhohang->id_Trang_thai2 = $id_trangthai;
        $duyetkhohang->save();
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
        //
    }
}
