@extends('layouts.app')
@section('content')	
<div class="card">
    <div class="text-center">
        <div class="card">
            <form class="form-horizontal" method="post" action="{{route('KhoHang.update',$khohang->idKhoHang)}}" enctype="multipart/form-data">
                @method("PUT")
                @csrf
                <div class="card-header">
                    <h4 class="card-title">
                      Sửa Sản Phẩm
                    </h4>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Trạng Thái</label>
                    <div class="col-md-9">
                        <select class="selectpicker" data-style="btn btn-danger btn-block" title="Trạng thái" data-size="7" name="Sua_TrangThai">
                            @foreach ($trangthai as $TrangThai)                                                                         
                            <option  value="{{$TrangThai->idTrangThai_SanPham}}">{{$TrangThai->nameTrangThai_SanPham}}</option>               
                            @endforeach
                        </select>
                    </div>
                </div>   

                <div class="form-group">
                    <label class="col-md-3 control-label">Số Lượng</label>
                    <div class="col-md-9">
                        <input type="number" placeholder="0" value="{{$khohang->SoLuong_KH}}" name="Sua_So_Luong" class="form-control">
                    </div>
                </div>              
                    <div class="form-group">
                        <label class="col-md-3 control-label">Ngày Nhập Kho</label>
                        <div class="col-md-9">
                            <input type="date" placeholder="Ngày" name="Sua_Ngay_Nhap" class="form-control">
                        </div>
                    </div>
                <div class="card-footer">
                    <div class="form-group">
                        <label class="col-md-3"></label>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-fill btn-info">
                                submit
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div> <!-- end card -->
    </div>
</div>
 @endsection