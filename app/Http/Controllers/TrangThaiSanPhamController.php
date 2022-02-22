<?php

namespace App\Http\Controllers;

use App\Models\TrangThaiSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TrangThaiSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listTrangthai = TrangThaiSanPham::where('nameTrangThai_SanPham', 'like', "%$search%")->paginate(5);
        return view('Trangthaisanpham.index', [
            "listTrangthai" => $listTrangthai,
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
        $TrangThaiSanPham = TrangThaiSanPham::all();
        return view('Trangthaisanpham.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('ten_Trang_thai_san_pham');
        $TrangThaiSanPham = new TrangThaiSanPham();
        $TrangThaiSanPham->nameTrangThai_SanPham = $name;
        $TrangThaiSanPham->save();
        return Redirect::route('Trangthaisanpham.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $TrangThaiSanPham = TrangThaiSanPham::find($id);
        return $TrangThaiSanPham;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $TrangThaiSanPham = TrangThaiSanPham::find($id);
        return view('Trangthaisanpham.edit', [
            "trangthaisanpham" => $TrangThaiSanPham
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
        $TrangThaiSanPham = TrangThaiSanPham::find($id);
        $TrangThaiSanPham->nameTrangThai_SanPham = $request->get('Sua_Trang_thai_san_pham');
        $TrangThaiSanPham->save();
        return Redirect::route('Trangthaisanpham.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TrangThaiSanPham::find($id)->delete();
        return Redirect::route('Trangthaisanpham.index');
    }
}
