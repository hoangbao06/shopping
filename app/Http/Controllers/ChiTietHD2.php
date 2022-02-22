<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use App\Models\HoaDonChiTiet;
use Illuminate\Http\Request;

class ChiTietHD2 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $search = $request->get('search');
        // SELECT * FROM `hoadon` INNER JOIN hoadonchitiet on hoadonchitiet.id_Hoadon = hoadon.idHoadon 
        // INNER JOIN sanpham ON hoadonchitiet.id_San_Pham = sanpham.idSanPham 
        // INNER JOIN user ON user.idKhachhang = hoadon.idKhach_hang
        $ChiTietHoaDon = HoaDon::join('hoadonchitiet', 'hoadonchitiet.id_Hoadon', '=', 'hoadon.idHoadon')
            ->join('sanpham', 'hoadonchitiet.id_San_Pham', '=', 'sanpham.idSanPham')
            ->join('user', 'user.idKhachhang', '=', 'hoadon.idKhach_hang')
            ->where('id_Hoadon', '=', $id)
            ->where('nameHoaDon', 'like', "%$search%")->paginate(5);
        $TongTien = HoaDonChiTiet::where('id_Hoadon', '=', $id)->sum('TongTien');
        return view('ChiTietHoaDon.index', [
            'chitiethoadon' => $ChiTietHoaDon,
            'tongtien' => $TongTien,
            'search' => $search
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
        //
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
