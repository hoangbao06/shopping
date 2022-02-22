<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ChinhSuaThongTinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function edit($id)
    {



        $KhachHang = KhachHang::where('idKhachhang', '=', $id)->first();

        return view('User.edit', [
            'khachhang' => $KhachHang,
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
        // $idkhachHang = $request->get('id_Khach_hang');
        $name = $request->get('Sua_ten_User');
        $email = $request->get('Sua_email');
        $matKhau = $request->get('Sua_MatKhau');
        $NgaySinh = $request->get('Sua_Ngay');
        $GioiTinh = $request->get('Sua_Gioi_Tinh');
        $DiaChi = $request->get('Sua_Dia_chi');
        $Sdt = $request->get('Sua_SDT');
        $KhachHang = KhachHang::find($id);
        $KhachHang->nameKhachhang = $name;
        $KhachHang->email = $email;
        $KhachHang->passWord = $matKhau;
        $KhachHang->DoB = $NgaySinh;
        $KhachHang->gioiTinh = $GioiTinh;
        $KhachHang->diaChi = $DiaChi;
        $KhachHang->sdt = $Sdt;
        $KhachHang->save();
        return Redirect::route('ChinhSuaThongTin.edit', $id);
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
