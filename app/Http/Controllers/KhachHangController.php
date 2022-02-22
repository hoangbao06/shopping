<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\PhanLoaiKhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Phanloaikhachhang as GlobalPhanloaikhachhang;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $phanloai = PhanLoaiKhachHang::all();
        $search = $request->get('search');
        $KhachHang = KhachHang::join('phanloaikhachhang', 'phanloaikhachhang.idPhanLoai', '=', 'user.Loaikhachhang')->where('nameKhachhang', 'like', "%$search%")->paginate(5);
        // ::join('phanloaikhachhang', 'phanloaikhachhang.idPhanLoai', '=', 'user.Loaikhachhang')
        return view('KhachHang.index', [
            'khachhang' => $KhachHang,
            'phanloaiKhach' => $phanloai,
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

        $phanloai = PhanLoaiKhachHang::all();
        $KhachHang = KhachHang::where('idKhachhang', '=', $id)->first();
        return view('KhachHang.edit', [
            "khachhang" => $KhachHang,
            "phanloai" => $phanloai
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
        $name = $request->get('Sua_ten_User');
        $email = $request->get('Sua_email');
        $matKhau = $request->get('Sua_MatKhau');
        $NgaySinh = $request->get('Sua_Ngay');
        $GioiTinh = $request->get('Sua_Gioi_Tinh');
        $DiaChi = $request->get('Sua_Dia_chi');
        $Sdt = $request->get('Sua_SDT');
        $idChucVu =  $request->get('id_Khach_hang');
        $KhachHang = KhachHang::find($id);
        $KhachHang->nameKhachhang = $name;
        $KhachHang->email = $email;
        $KhachHang->passWord = $matKhau;
        $KhachHang->DoB = $NgaySinh;
        $KhachHang->gioiTinh = $GioiTinh;
        $KhachHang->diaChi = $DiaChi;
        $KhachHang->sdt = $Sdt;
        $KhachHang->Loaikhachhang = $idChucVu;
        $KhachHang->save();
        return Redirect::route('KhachHang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KhachHang::find($id)->delete();
        return Redirect::route('KhachHang.index');
    }
}
