<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listDanhMuc = DanhMuc::where('nameDanhMuc', 'like', "%$search%")->paginate(5);
        return view('DanhMuc.index', [
            "listdanhmuc" =>  $listDanhMuc,
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
        $DanhMuc = DanhMuc::all();
        return view('DanhMuc.create', [
            "danhmuc" => $DanhMuc
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
        $name = $request->get('ten_Danh_muc');
        $DanhMuc = new DanhMuc();
        $DanhMuc->nameDanhMuc = $name;
        $DanhMuc->save();
        return Redirect::route('DanhMuc.index');
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
        $DanhMuc = DanhMuc::find($id);
        return view('DanhMuc.edit', [
            "danhmuc" => $DanhMuc
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
        $DanhMuc = DanhMuc::find($id);
        $DanhMuc->nameDanhMuc = $request->get('Sua_Danh_muc');
        $DanhMuc->save();
        return Redirect::route('DanhMuc.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DanhMuc::find($id)->delete();
        return Redirect::route('DanhMuc.index');
    }
}
