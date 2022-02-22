@extends('layouts.app')
@section('content')	
<div class="card">
    <div class="text-center">
        <div class="card">
            <form class="form-horizontal" method="post" action="{{route('SanPham.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h4 class="card-title">
                        Thêm Sản Phẩm
                    </h4>
                </div>
                <div class="card-content">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tên Sản Phẩm</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="Tên sản phẩm" name="Ten_San_Pham" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Giá</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="Giá" name="gia_san_pham" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Số Lượng</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="Số lượng" name="So_Luong_SP" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Ảnh</label>
                        <div class="col-md-9">
                            <input type="file" placeholder="Ảnh" name="anh_SP" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row" >
                            <br>
                            <div class="col-sm-4"> </div>
                            <div class="col-sm-4"> 
                                <select class="selectpicker" data-style="btn btn-danger btn-block" title="Trạng thái" data-size="7" name="Danh_Muc">
                                    @foreach ($danhmuc as $DanhMuc)                                                                         
                                    <option value="{{ $DanhMuc->idDanh_Muc}}">{{ $DanhMuc->nameDanhMuc}}</option>               
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4"> </div>
                            </div>     
                    </div>
                    <div class="form-group">
                        <div class="row" >
                            <br>
                            <div class="col-sm-4"> </div>
                            <div class="col-sm-4"> 
                                <select class="selectpicker" data-style="btn btn-danger btn-block" title="Trạng thái" data-size="7" name="Trang_thai">
                                    @foreach ($Trangthai as $trangThai)                                                                         
                                    <option value="{{ $trangThai->idTrangThai_SanPham}}">{{ $trangThai->nameTrangThai_SanPham}}</option>               
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4"> </div>
                            </div>     
                    </div>
                <div class="card-footer">
                    <div class="form-group">
                        <label class="col-md-3"></label>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-fill btn-info" >
                                Create
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div> <!-- end card -->
    </div>
 @endsection