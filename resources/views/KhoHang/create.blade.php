@extends('layouts.app')
@section('content')	
<div class="card">
    {{-- thêm sử POSt --}}
    <form method="POST"  action="{{route('KhoHang.store')}}">
        @csrf
        <div class="card-header">
            <h4 class="card-title">
                thêm Sản Phẩm
            </h4>
        </div>
        <div class="card-content">
            <div class="form-group">
                <select class="selectpicker" data-style="btn btn-danger btn-block" title="Sản Phẩm" data-size="7" name="ID_SP_KH">
                    @foreach ($sanpham as $SanPham)                                                                         
                    <option value="{{ $SanPham->idSanPham}}">{{ $SanPham->nameSanPham}}</option>               
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-content">
            <div class="form-group">
                <label>Số Lượng</label>
                <input type="number" name="So_Luong_KH"  class="form-control">
            </div>
        </div>
        <div class="card-content">
            <div class="form-group">
                <select class="selectpicker" data-style="btn btn-danger btn-block" title="trạng Thái" data-size="7" name="ID_TT_KH">
                    @foreach ($trangthai as $TrangThai)                                                                         
                    <option value="{{$TrangThai->idTrangThai_SanPham}}">{{$TrangThai->nameTrangThai_SanPham}}</option>               
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-content">
            <div class="form-group">
                <select class="selectpicker" data-style="btn btn-danger btn-block" title="Nhập Kho" data-size="7" name="ID_NK_KH">
                    @foreach ($nhapkho as $Nhapkho)                                                                         
                    <option value="{{$Nhapkho->idNhapKho}}">{{$Nhapkho->SoLuong_NK}}</option>               
                    @endforeach
                </select>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <select class="selectpicker" data-style="btn btn-danger btn-block" title="Xuất Kho" data-size="7" name="ID_XK_KH">
                        @foreach ($xuatkho as $XuatKho)                                                                         
                        <option value="{{$XuatKho->idXuatKho}}">{{$XuatKho->soluong_XK}}</option>               
                        @endforeach
                    </select>
                </div>
            </div>
        </div class="text-center">
            <button type="submit" class="btn btn-fill btn-info">Submit</button>
        </div>
    </form>
</div> 
 @endsection