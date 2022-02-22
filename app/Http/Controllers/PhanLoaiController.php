<?php

namespace App\Http\Controllers;

use App\Models\PhanLoaiKhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PhanLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listPhanLoai = PhanLoaiKhachHang::where('namePhanLoai', 'like', "%$search%")->paginate(5);
        return view('PhanLoaiKhachHang.index', [
            "listLoaiphan" => $listPhanLoai,
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
        $name = $request->get('ten_Phan_Loai');
        $PhanLoai = new PhanLoaiKhachHang();
        $PhanLoai->namePhanLoai = $name;
        $PhanLoai->save();
        return Redirect::route('PhanLoaiKhachHang.index');
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
        $PhanLoai = PhanLoaiKhachHang::find($id);
        return view('PhanLoaiKhachHang.edit', [
            "phanLoaiKhachhang" => $PhanLoai
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
        $PhanLoai = PhanLoaiKhachHang::find($id);
        $PhanLoai->namePhanLoai = $request->get('Sua_Ten_Phan_Loai');
        $PhanLoai->save();
        return Redirect::route('PhanLoaiKhachHang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PhanLoaiKhachHang::find($id)->delete();
        return Redirect::route('PhanLoaiKhachHang.index');
    }
}
