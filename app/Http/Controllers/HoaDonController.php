<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use App\Models\HoaDonChiTiet;
use App\Models\SanPham;
use App\Models\TrangThaiHoaDon;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class HoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // SELECT * FROM `hoadon` INNER JOIN trangthaihoadon ON hoadon.idTrangThaiHoaDon = trangthaihoadon.idTrangThai
        $search = $request->get('search');
        $HoaDon = HoaDon::join('trangthaihoadon', 'hoadon.idTrangThaiHoaDon', '=', 'trangthaihoadon.idTrangThai')
            ->where('idTrangThaiHoaDon', '=', 2)
            ->where('nameHoaDon', 'like', "%$search%")->paginate(5);
        return view('HoaDon.index', [
            'hoadon' => $HoaDon,
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
        // tổng thiệt hại hóa đơn lấy ra 
        // $idHoaDon = $request->get('id_Hoadon');
        // $idHoaDonChiTiet = $request->get('idHoaDonChiTiet');
        $idKhachhang = $request->session()->get('idUser');
        $date = date('Y-m-d', time());
        // $HoaDonChiTiet = HoaDonChiTiet::whereNull('id_Hoadon')->where('id_Khachhang1', '=', $idKhachhang)->get();
        $TongTien = HoaDonChiTiet::whereNull('id_Hoadon')->where('id_Khachhang1', '=', $idKhachhang)->sum('TongTien');
        $nameHoaDon = $request->session()->get('nameUser');
        $trangThaiHoaDon = TrangThaiHoaDon::where('idTrangThai', '=', 2)->first();
        // // tạo hóa đơn
        $HoaDon = new HoaDon();
        $HoaDon->nameHoaDon = $nameHoaDon;
        $HoaDon->ngayDat = $date;
        $HoaDon->thanhtien = $TongTien;
        $HoaDon->idKhach_hang = $idKhachhang;
        $HoaDon->idTrangThaiHoaDon = 2;
        $HoaDon->save();

        // update hóa đơn chi tiết

        $HoaDon = HoaDon::where('idTrangThaiHoaDon', '=', 2)->where('idKhach_hang', '=', $idKhachhang)->orderBy('idHoadon', 'DESC')->first();
        $idHoaDon = $HoaDon->idHoadon;



        $HoaDonChiTiet = HoaDonChiTiet::whereNull('id_Hoadon')->where('id_Khachhang1', '=', $idKhachhang)->update(['id_Hoadon' => $idHoaDon]);

        return Redirect::route('TrangChuView');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
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
        //
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

        // $id_trangthai = 3;
        $duyetHoaHon = HoaDon::where('idHoadon', '=', $id)->first();
        $duyetHoaHon->idTrangThaiHoaDon = 3;
        $duyetHoaHon->save();
        return Redirect::route('HoaDonThanhToan.index');
        // return $duyetHoaHon;
        // return $id;
        // return $duyetHoaHon;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        HoaDonChiTiet::where('id_HoaDon', '=', $id)->delete();

        HoaDon::find($id)->delete();
        // return $HoaDonChiTiet;
        return Redirect::route('HoaDonThanhToan.index');
    }
}
