<?php

namespace App\Http\Controllers;

use App\Models\TinhTrangXuatNhap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TinhTrangXuatNhapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listTinhTrang = TinhTrangXuatNhap::where('nameTinhTrangXuatNhap', 'like', "%$search%")->paginate(5);
        return view('TinhTrangXuatNhap.index', [
            "listtinhrang" =>  $listTinhTrang,
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
        $TinhTrang = TinhTrangXuatNhap::all();
        return view('TinhTrangXuatNhap.create', [
            "TinhTrang" => $TinhTrang
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
        $name = $request->get('ten_Tinh_trang');
        $TinhTrang = new TinhTrangXuatNhap();
        $TinhTrang->nameTinhTrangXuatNhap = $name;
        $TinhTrang->save();
        return Redirect::route('TinhTrangXuatNhap.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $TinhTrang = TinhTrangXuatNhap::find($id);
        return $TinhTrang;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $TinhTrang = TinhTrangXuatNhap::find($id);
        return view('TinhTrangXuatNhap.edit', [
            "TinhTrang" => $TinhTrang
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
        $TinhTrang = TinhTrangXuatNhap::find($id);
        $TinhTrang->nameTinhTrangXuatNhap = $request->get('Sua_Tinh_Trang');
        $TinhTrang->save();
        return Redirect::route('TinhTrangXuatNhap.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TinhTrangXuatNhap::find($id)->delete();
        return Redirect::route('TinhTrangXuatNhap.index');
    }
}
