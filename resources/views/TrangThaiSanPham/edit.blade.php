@extends('layouts.app')
@section('content')	
<div class="card">
    {{-- sửa --}}
    <form method="post" action="{{route('Trangthaisanpham.update',$trangthaisanpham->idTrangThai_SanPham)}}">
        @method("PUT")
        @csrf
        <div class="card-header">
            <Div class="text-center">
                <h4 class="card-title">
                    Sửa tên Trạng thái Sản phẩm
                </h4>
            </Div>
        </div>
        <div class="card-content">
            <div class="form-group">
                <Div class="text-center">
                    <label>Tên Trạng thái Sản phẩm</label>
                    <input type="text" name="Sua_Trang_thai_san_pham"  class="form-control" value="{{$trangthaisanpham->nameTrangThai_SanPham}}">
                </Div>
            </div>
            <Div class="text-center">
                <button type="submit" class="btn btn-fill btn-info">Sửa</button>
            </Div>
        </div>
    </form>
</div> 
 @endsection