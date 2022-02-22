<?php

namespace App\Http\Controllers;

use App\Models\KhuyenMaiKhachHang;
use App\Models\PhanLoaiKhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use KhuyenMai;

class KhuyenMaiKhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $KhuyenMai = KhuyenMaiKhachHang::join('phanloaikhachhang', 'phanloaikhachhang.idPhanLoai', '=', 'khuyenmaikhachhang.idPhanLoaikhachhang')
            ->where('MakhuyenMai', 'like', "%$search%")->paginate(5);
        return view('KhuyenMaiKhachHang.index', [
            'Khuyenmaikhachhang' => $KhuyenMai,
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
        $phanLoaiKhachHang = PhanLoaiKhachHang::all();
        return view('KhuyenMaiKhachHang.create', [
            "PhanLoaiKhachHang" => $phanLoaiKhachHang
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
        $name = $request->get('Ten_Ma_KM');
        $maKM = $request->get('Ma_KM');
        $solan = $request->get('So_Lan_KM');
        $PhanTram = $request->get('Phan_Tram_KM');
        $LoaiKhach = $request->get('Phan_Loai_KH');
        $KhuyenMai = new KhuyenMaiKhachHang();
        $KhuyenMai->nameKhuyenMai = $name;
        $KhuyenMai->MakhuyenMai = $maKM;
        $KhuyenMai->solanKhuyenMai = $solan;
        $KhuyenMai->phanTramGiamGia = $PhanTram;
        $KhuyenMai->idPhanLoaikhachhang = $LoaiKhach;
        $KhuyenMai->save();
        return Redirect::route('KhuyenMaiKhachHang.index');
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
        $KhuyenMai = KhuyenMaiKhachHang::find($id);
        $phanLoaiKhachHang = PhanLoaiKhachHang::all();
        return view('KhuyenMaiKhachHang.edit', [
            "KhuyenMaiKhachHang" => $KhuyenMai,
            "PhanLoaiKhachHang" => $phanLoaiKhachHang
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
        $name = $request->get('Sua_ten_KM');
        $maKM = $request->get('Sua_Ma_KM');
        $PhanTram = $request->get('Sua_Phan_tram_KM');
        $solan = $request->get('Sua_solan_KM');
        $LoaiKhach = $request->get('Sua_Loai_Khach');

        $KhuyenMai = KhuyenMaiKhachHang::find($id);

        $KhuyenMai->MakhuyenMai = $maKM;
        $KhuyenMai->nameKhuyenMai = $name;
        $KhuyenMai->phanTramGiamGia = $PhanTram;
        $KhuyenMai->solanKhuyenMai = $solan;
        $KhuyenMai->idPhanLoaikhachhang  = $LoaiKhach;

        $KhuyenMai->save();
        return Redirect::route('KhuyenMaiKhachHang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KhuyenMaiKhachHang::find($id)->delete();
        return Redirect::route('KhuyenMaiKhachHang.index');
    }
}
