<?php

namespace App\Http\Controllers;

use App\Models\Quan;
use App\Models\ThanhPho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class QuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $thanhPho = ThanhPho::all();
        $search = $request->get('search');
        $listQuan = Quan::join('thanhpho', 'quan.idThanhpho', '=', 'thanhpho.idThanhPho')->where('nameQuan', 'like', "%$search%")->paginate(5);
        return view('Quan.index', [
            "listQuan" => $listQuan,
            "thanhpho" => $thanhPho,
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
        $name = $request->get('ten_Quan');
        $idthanhpho = $request->get('idthanhpho');
        $Quan = new Quan();
        $Quan->idThanhpho = $idthanhpho;
        $Quan->nameQuan = $name;
        $Quan->save();
        return Redirect::route('Quan.index');
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
        $thanhPho = ThanhPho::all();
        $Quan = Quan::find($id);
        return view('Quan.edit', [
            "Quan" => $Quan,
            "thanhpho" => $thanhPho
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
        $Quan = Quan::find($id);
        $Quan->nameQuan = $request->get('Sua_Ten_Quan');
        $Quan->idThanhPho = $request->get('sua_idthanhpho');
        $Quan->save();
        return Redirect::route('Quan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Quan::find($id)->delete();
        return Redirect::route('Quan.index');
    }
}
