@extends('layouts.app')
@section('content')	
<div class="card">
    {{-- sửa --}}
    <form method="post" action="{{route('AnhSanPham.update',$anhsanpham->idAnh )}}"  enctype="multipart/form-data" >
        @method("PUT")
        @csrf
        <div class="card-header">
            <Div class="text-center">
                <h4 class="card-title">
                    Sửa Ảnh Sản Phẩm
                </h4>
            </Div>
        </div>
        <div class="card-content">
            <div class="form-group">
                <Div class="text-center">
                    <label>Ảnh Sản Phẩm</label>
                    <input type="file" name="Sua_Anh_SP"  class="form-control" >
                </Div>
            </div>
            <div class="form-group">
                <Div class="text-center">
                    <label>ID Sản Phẩm</label>
                    <input type="text" name="Sua_ID_SP"  class="form-control" value="{{$anhsanpham->id_SanPham}}">
                </Div>
            </div>
            <Div class="text-center">
                <button type="submit" class="btn btn-fill btn-info">Sửa</button>
            </Div>
        </div>
    </form>
</div> 
 @endsection