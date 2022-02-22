@extends('layouts.app')
@section('content')	
<div class="card">
    <div class="text-center">
        <div class="card">
            <form class="form-horizontal" method="post" action="{{route('KhuyenMaiChiTiet.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h4 class="card-title">
                        Thêm Chi Tiết Khuyến Mãi 
                    </h4>
                </div>
                <div class="form-group">
                    <div class="row" >
                        <br>
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-4"> 
                            <select class="selectpicker" data-style="btn btn-danger btn-block" title="Tên Khách Hàng" data-size="7" name="Id_Khach_Hang">
                                @foreach ($khachhanng as $KhachHang)                                                                         
                                <option value="{{ $KhachHang->idKhachhang}}">{{$KhachHang->nameKhachhang}}</option>               
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
                            <select class="selectpicker" data-style="btn btn-danger btn-block" title="Tên Khuyến Mãi" data-size="7" name="ID_Khuyen_Mai">
                                @foreach ($KhuyenMaiKhachHang as $KhuyenMai)                                                                         
                                <option value="{{$KhuyenMai->idKhuyenMai}}">{{$KhuyenMai->nameKhuyenMai}}</option>               
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4"> </div>
                        </div>  
                    </div> 
                    <div class="form-group">
                        <label class="col-md-3 control-label">Ngày Sử Dụng</label>
                        <div class="col-md-9">
                            <input type="date" placeholder="Ngày" name="Ngay_SD" class="form-control">
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
</div>
 @endsection