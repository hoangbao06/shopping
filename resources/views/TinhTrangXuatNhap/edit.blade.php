@extends('layouts.app')
@section('content')	
<div class="card">
    {{-- sửa --}}
    <form method="post" action="{{route('TinhTrangXuatNhap.update',$TinhTrang->idTinhTrangXuatNhap)}}">
        @method("PUT")
        @csrf
        <div class="card-header">
            <Div class="text-center">
                <h4 class="card-title">
                    Sửa tên Tình Trạng 
                </h4>
            </Div>
        </div>
        <div class="card-content">
            <div class="form-group">
                <Div class="text-center">
                    <label>Tên Tình Trạng </label>
                    <input type="text" name="Sua_Tinh_Trang"  class="form-control" value="{{  $TinhTrang->nameTinhTrangXuatNhap}}">
                </Div>
            </div>
            <Div class="text-center">
                <button type="submit" class="btn btn-fill btn-info">Sửa</button>
            </Div>
        </div>
    </form>
</div> 
 @endsection