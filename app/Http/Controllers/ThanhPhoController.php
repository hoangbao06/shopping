<?php

namespace App\Http\Controllers;

use App\Models\ThanhPho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ThanhPhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listThanhPho = ThanhPho::where('nameThanhPho', 'like', "%$search%")->paginate(5);
        return view('ThanhPho.index', [
            "listThanhPho" => $listThanhPho,
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
        $name = $request->get('ten_Thanh_Pho');
        $ThanhPho = new ThanhPho();
        $ThanhPho->nameThanhPho = $name;
        $ThanhPho->save();
        return Redirect::route('ThanhPho.index');
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
        $ThanhPho = ThanhPho::find($id);
        return view('ThanhPho.edit', [
            "thanhpho" => $ThanhPho
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
        $ThanhPho = ThanhPho::find($id);
        $ThanhPho->nameThanhPho = $request->get('Sua_Ten_thanh_Pho');
        $ThanhPho->save();
        return Redirect::route('ThanhPho.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ThanhPho::find($id)->delete();
        return Redirect::route('ThanhPho.index');
    }
}
