@extends('layouts.app')
@section('content')	
<div class="card">
    {{-- sửa --}}
    <form method="post" action="{{route('PhanLoaiKhachHang.update',$phanLoaiKhachhang->idPhanLoai)}}">
        @method("PUT")
        @csrf
        <div class="card-header">
            <Div class="text-center">
                <h4 class="card-title">
                    Sửa tên Phân Loại 
                </h4>
            </Div>
        </div>
        <div class="card-content">
            <div class="form-group">
                <Div class="text-center">
                    <label>Tên Phân Loại </label>
                    <input type="text" name="Sua_Ten_Phan_Loai"  class="form-control" value="{{$phanLoaiKhachhang->namePhanLoai}}">
                </Div>
            </div>
            <Div class="text-center">
                <button type="submit" class="btn btn-fill btn-info">Sửa</button>
            </Div>
        </div>
    </form>
</div> 
 @endsection