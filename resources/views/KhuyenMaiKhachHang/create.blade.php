@extends('layouts.app')
@section('content')	
<div class="card">
    <div class="text-center">
        <div class="card">
            <form class="form-horizontal" method="post" action="{{route('KhuyenMaiKhachHang.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h4 class="card-title">
                        Thêm Mã Khuyến Mãi
                    </h4>
                </div>
                <div class="card-content">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tên Mã Khuyến Mãi</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="Tên Mã Khuyến" name="Ten_Ma_KM" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Mã Khuyến Mại</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="Mã" name="Ma_KM" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Số Lần Sử Dụng</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="Số Lần Khuyến Mãi" name="So_Lan_KM" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Phần Trăm Được Giảm</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="Phần Trăm Giảm" name="Phan_Tram_KM" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row" >
                            <br>
                            <div class="col-sm-4"> </div>
                            <div class="col-sm-4"> 
                                <select class="selectpicker" data-style="btn btn-danger btn-block" title="Loại Khách Hàng" data-size="7" name="Phan_Loai_KH">
                                    @foreach ($PhanLoaiKhachHang as $PhanLoai)                                                                         
                                    <option value="{{ $PhanLoai->idPhanLoai}}">{{ $PhanLoai->namePhanLoai}}</option>               
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
                            <button type="submit" class="btn btn-fill btn-info">
                                Create
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div> <!-- end card -->
    </div>
<
 @endsection