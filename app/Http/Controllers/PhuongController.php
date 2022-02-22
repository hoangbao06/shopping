<?php

namespace App\Http\Controllers;

use App\Models\Phuong;
use App\Models\Quan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PhuongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Quan = Quan::all();
        $search = $request->get('search');
        $listPhuong = Phuong::join('quan', 'phuong.idquan', '=', 'quan.idQuan')->where('namePhuong', 'like', "%$search%")->paginate(5);
        return view('Phuong.index', [
            "listPhuong" => $listPhuong,
            "Quan" => $Quan,
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
        $name = $request->get('ten_Phuong');
        $idquan = $request->get('idQuan');
        $Phuong = new Phuong();
        $Phuong->namePhuong = $name;
        $Phuong->idquan = $idquan;
        $Phuong->save();
        return Redirect::route('Phuong.index');
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
        $Quan = Quan::all();
        $Phuong = Phuong::find($id);
        return view('Phuong.edit', [
            "Quan" => $Quan,
            "Phuong" => $Phuong
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
        $Phuong = Phuong::find($id);
        $Phuong->namePhuong = $request->get('Sua_Ten_Phuong');
        $Phuong->idquan = $request->get('sua_idQuan');
        $Phuong->save();
        return Redirect::route('Phuong.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Phuong::find($id)->delete();
        return Redirect::route('Phuong.index');
    }
}
