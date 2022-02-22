<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use Illuminate\Http\Request;

class ThongKeDoanhThu extends Controller
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
        $thang = $id;
        $Thongkethang = HoaDon::whereMonth('ngayDat', $id)->whereYear('ngayDat', '2022')->sum('thanhtien');
        $TongHoaDon = HoaDon::whereMonth('ngayDat', $id)->whereYear('ngayDat', '2022')->count('idHoadon');
        if ($Thongkethang == 0) {
            $Thongkethang = 'Tháng này covid không ai mua';
            return $Thongkethang;
        } else {
            return view('thongKe.show', [
                'thongkethang' => $Thongkethang,
                'tonghoadon' => $TongHoaDon,
                'thang' => $thang
            ]);
            return $TongHoaDon;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
