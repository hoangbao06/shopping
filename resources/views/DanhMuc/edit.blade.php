@extends('layouts.app')
@section('content')	
<div class="card">
    {{-- sửa --}}
    <form method="post" action="{{route('DanhMuc.update',$danhmuc->idDanh_Muc)}}">
        @method("PUT")
        @csrf
        <div class="card-header">
            <Div class="text-center">
                <h4 class="card-title">
                    Sửa tên Danh Mục
                </h4>
            </Div>
        </div>
        <div class="card-content">
            <div class="form-group">
                <Div class="text-center">
                    <label>tên Danh Mục</label>
                    <input type="text" name="Sua_Danh_muc"  class="form-control" value="{{  $danhmuc->nameDanhMuc}}">
                </Div>
            </div>
            <Div class="text-center">
                <button type="submit" class="btn btn-fill btn-info">Sửa</button>
            </Div>
        </div>
    </form>
</div> 
 @endsection