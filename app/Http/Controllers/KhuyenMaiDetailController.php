<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\KhuyenMaiDetail;
use App\Models\KhuyenMaiKhachHang;
use App\Models\PhanLoaiKhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use KhuyenMai;

class KhuyenMaiDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $PhanLoai = PhanLoaiKhachHang::all();
        $search = $request->get('search');
        $KhuyenMaiDetail = KhuyenMaiDetail::join('user', 'user.idKhachhang', '=', 'khuyenmaideatil.idkhachhang')
            ->join('khuyenmaikhachhang', 'khuyenmaikhachhang.idKhuyenMai', '=', 'khuyenmaideatil.idKhuyenMai2')
            ->where('MakhuyenMai', 'like', "%$search%")->paginate(5);
        return view('KhuyenMaiChiTiet.index', [
            'KhuyenmaiChiTiet' => $KhuyenMaiDetail,
            'PhanLoaiKhachHang' => $PhanLoai,
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
        $KhachHang = KhachHang::all();
        $KhuyenMai = KhuyenMaiKhachHang::all();
        return view('KhuyenMaiChiTiet.create', [
            "khachhanng" => $KhachHang,
            "KhuyenMaiKhachHang" => $KhuyenMai
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
        $idKhachHang = $request->get('Id_Khach_Hang');
        $idkhuyenMai = $request->get('ID_Khuyen_Mai');
        $NgaySD = $request->get('Ngay_SD');
        $KhuyenMaiDetail = new KhuyenMaiDetail();
        $KhuyenMaiDetail->idkhachhang = $idKhachHang;
        $KhuyenMaiDetail->idKhuyenMai2 = $idkhuyenMai;
        $KhuyenMaiDetail->NgaySuDung = $NgaySD;
        $KhuyenMaiDetail->save();
        return Redirect::route('KhuyenMaiChiTiet.index');
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
        KhuyenMaiDetail::find($id)->delete();
        return Redirect::route('KhuyenMaiChiTiet.index');
    }
}
