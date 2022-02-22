<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use App\Models\HoaDonChiTiet;
use Illuminate\Http\Request;

class DuyetHoaDon extends Controller
{
    public function DuyetHoaDon1(Request $request)
    {
        $search = $request->get('search');
        $HoaDon = HoaDon::join('trangthaihoadon', 'hoadon.idTrangThaiHoaDon', '=', 'trangthaihoadon.idTrangThai')
            ->where('idTrangThaiHoaDon', '=', 3)
            ->where('nameHoaDon', 'like', "%$search%")->paginate(5);
        return view('HoaDon.show', [
            'hoadon' => $HoaDon,
            'search' => $search
        ]);
    }
}
