<?php

namespace App\Http\Controllers;

use App\Models\AnhSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class anhSanPham2 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listAnh = AnhSanPham::where('anhsanPham', 'like', "%$search%")->paginate(5);
        return view('AnhSanPham.index', [
            "listAnh" =>  $listAnh,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $idSanPham = $request->get('id-san-pham');
        $AnhSanPham = AnhSanPham::all();

        return view('AnhSanPham.create', [
            "anhsanpham" => $AnhSanPham,
            "idSanPham" =>  $idSanPham
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
        $anhSP = $request->file('Anh_San_pham');
        $folder = 'assets/image';
        $nameImage = $anhSP->getClientOriginalName();
        $anhSP->move($folder, $nameImage);

        $idSP = $request->get('id_San_Pham');
        $AnhSanPham = new AnhSanPham();

        $AnhSanPham->anhsanPham = $folder . '/' . $nameImage;
        $AnhSanPham->id_SanPham = $idSP;
        $AnhSanPham->save();
        return Redirect::route('SanPham.show', $idSP);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $AnhSanPham = AnhSanPham::find($id);
        return $AnhSanPham;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $AnhSanPham = AnhSanPham::where('idAnh', '=', $id)->first();
        return view('AnhSanPham.edit', [
            "anhsanpham" => $AnhSanPham
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

        $anh = $request->file('Sua_Anh_SP');
        $idSanPham = $request->get('Sua_ID_SP');

        $AnhSanPham = AnhSanPham::find($id);
        $folder = 'assets/image';
        $nameImage = $anh->getClientOriginalName();
        $anh->move($folder, $nameImage);

        $AnhSanPham->id_SanPham = $idSanPham;
        $AnhSanPham->anhsanPham = $folder . '/' . $nameImage;
        $AnhSanPham->save();
        return Redirect::route('SanPham.show', $idSanPham);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $idSanPham = $request->get('id-san-pham');
        AnhSanPham::find($id)->delete();
        return Redirect::route('SanPham.show', $idSanPham);
    }
}
