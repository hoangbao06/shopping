<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use App\Models\chucVu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ChucVucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listChucVu = chucVu::where('nameChucvu', 'like', "%$search%")->paginate(5);
        return view('ChucVu.index', [
            "listchucvu" =>  $listChucVu,
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
        $quyen = chucVu::all();
        return view('ChucVu.create', [
            "quyen" => $quyen
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
        $name = $request->get('ten_Chuc_Vu');
        // DB::insert("INSERT INTO chucvu(namechucvu) VALUES ('$name')");
        // DB::table('chucvu')->insert(["namechucvu" => $name]);
        $ChucVu = new ChucVu();
        $ChucVu->namechucvu = $name;
        $ChucVu->save();
        return Redirect::route('Chucvu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ChucVu = ChucVu::find($id);
        return $ChucVu;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ChucVu = ChucVu::find($id);
        return view('Chucvu.edit', [
            "chucvu" => $ChucVu
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
        $ChucVu = chucVu::find($id);
        $ChucVu->nameChucvu = $request->get('Sua_chuc_vu');
        $ChucVu->save();
        return Redirect::route('Chucvu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        chucVu::find($id)->delete();
        return Redirect::route('Chucvu.index');
    }
}
