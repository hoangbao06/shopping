@extends('layouts.app')
@section('content')	
<div class="card">
    {{-- sửa --}}
    <form method="post" action="{{route('SanPham.update', $sanpham->idSanPham)}}" enctype="multipart/form-data" >
        @method("PUT")
        @csrf
        <div class="card-header">
            <h4 class="card-title">
               Sửa Sản Phẩm
            </h4>
        </div>
        <div class="card-content">
            <div class="form-group">
                <label>Tên Sản Phẩm</label>
                <input type="text" name="Sua_ten_SP"  class="form-control" value="{{$sanpham->nameSanPham}}" >
            </div>
            <div class="form-group">
                <label>Giá</label>
                <input type="text" name="Sua_gia_SP"  class="form-control" value="{{$sanpham->gia_SP}}">
            </div>
            <div class="form-group">
                <label>Ảnh</label>
                <input type="file" name="Sua_anh_SP"  class="form-control" value="{{$sanpham->anh}}">
            </div>
            <div class="form-group">
                <label>Số Lượng</label>
                <input type="text" name="Sua_soluong_SP"  class="form-control" value="{{$sanpham->SoLuong}}">
            </div>
            <div class="form-group">
                <div class="form-group">
                    <select class="selectpicker" data-style="btn btn-danger btn-block" title="Trạng thái" data-size="7" name="Sua_Trangthai_SP">
                        @foreach ($TrangThai as $trangthai)                                                                         
                        <option  value="{{$trangthai->idTrangThai_SanPham}}">{{$trangthai->nameTrangThai_SanPham}}</option>               
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-info btn-fill btn-wd">Update </button>
        </div>
    </form>
</div> 
 @endsection