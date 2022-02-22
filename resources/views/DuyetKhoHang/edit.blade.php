@extends('layouts.app')
@section('content')	
<div class="card">
    {{-- thêm sử POSt --}}
    <form method="post" action="{{route('DuyetKhoHang.update',$duyetkhohang->idKhoHang)}}">
        @method("PUT")
        @csrf
        <div class="card-header">
            <h4 class="card-title">
                Cập Nhật Trạng Thái Kho Hàng 
            </h4>
        </div>
        <div class="card-content">
            <div class="form-group">
                <select class="selectpicker" data-style="btn btn-danger btn-block" title="trạng Thái" data-size="7" name="ID_TT_KH2">
                    @foreach ($trangthai as $TrangThai)                                                                         
                    <option value="{{$TrangThai->idTrangThai_SanPham}}">{{$TrangThai->nameTrangThai_SanPham}}</option>               
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-fill btn-info" style="margin-left: 500px">Submit</button>
        </div>
    </form>
</div> 
 @endsection