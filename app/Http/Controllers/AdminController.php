<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chucVu;
use App\Models\Admin;
use Chucvu as GlobalChucvu;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $admin = Admin::join('chucvu', 'admin.idchucvu', '=', 'chucvu.idChucVu')->where('nameNhanVien', 'like', "%$search%")->paginate(5);
        return view('admin.index', [
            'admin' => $admin,
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
        return view('Admin.create', [
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
        $name = $request->get('Ten_Nhan_vien');
        $email = $request->get('email');
        $pass = $request->get('pass');
        $quyen = $request->get('quyen');
        $admin = new Admin();
        $admin->nameNhanVien = $name;
        $admin->email = $email;
        $admin->passWord = $pass;
        $admin->idchucvu   = $quyen;
        $admin->save();
        return Redirect::route('Admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Admin = Admin::find($id);
        return $Admin;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Admin = Admin::join('chucvu', 'admin.idchucvu', '=', 'chucvu.idChucVu')->where('admin.idNhanVien', '=', $id)->first();
        $quyen = chucVu::all();
        return view('Admin.edit', [
            "admin" => $Admin,
            "quyen" => $quyen
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
        $name = $request->get('Sua_ten_NhanVien');
        $email = $request->get('Sua_email');
        $matKhau = $request->get('Sua_MatKhau');
        $idChucVu =  $request->get('quyen_chuc_vu');
        $Admin = Admin::find($id);
        $Admin->nameNhanVien = $name;
        $Admin->email = $email;
        $Admin->passWord = $matKhau;
        $Admin->idchucvu = $idChucVu;
        $Admin->save();
        return Redirect::route('Admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::find($id)->delete();
        return Redirect::route('Admin.index');
    }
}
