@extends('layouts3.app')
@section('content')
<div class="wrapper">
    <div class="row">
        <div class="page-header page-header-xs settings-background" style="background-image: url('{{asset('assets2')}}/img/sections/joshua-earles.jpg');">
            <div class="filter"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h4 class="title">Đơn Hàng Đã Mua</h4>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        <div class="col-md-10 ml-auto mr-auto">
        <div class="table-responsive">
            <table class="table table-shopping">
                <thead>
                    <tr>
                    
                        <th class="text-center">Tên Sản Phẩm</th>
                        <th></th>
                        <th class="text-center">Số Lượng</th>
                        <th class="text-center">Giá Sản phẩm</th>
                        <th class="text-center">Ngày Đặt</th>
                        <th class="text-center">Trạng Thái</th>
                    </tr>
                </thead>
                
                <tbody>  
                    @foreach ($lichsumuahang as $LichSuMuaHang)            
                    <tr>
                        <td>
                            <div class="img-container text-center">
                                <small>{{$LichSuMuaHang->nameSanPham}}</small>
                            </div>
                        </td>
                        <td>
                            <div class="img-container text-center">
                                <img src="{{$LichSuMuaHang->anh}}" alt="Agenda">
                            </div>
                        </td>
                        <td class="td-number text-center">
                            {{$LichSuMuaHang->SoLuong_HDCT}}
                        </td>
                        <td class="td-price text-center" >
                            {{-- {{number_format($LichSuMuaHang->gia_SP , 0, ".",".")}} --}}
                            <small >{{number_format($LichSuMuaHang->gia_SP , 0, ".",".")}}  VNĐ</small>
                        </td>
                        <td class="td-product text-center">
                            <strong>{{$LichSuMuaHang->ngayDat}}</strong>
                        </td>
                        <td class="td-number text-center">
                            <small>{{$LichSuMuaHang->nameTrangThai}}</small>
                        </td>
                    </tr>
                    {{-- <tr> --}}
                {{-- <td> <button type="button" class="btn btn-info btn-l">Complete Purchase <i class="fa fa-chevron-right"></i></button></td>
                <td></td> --}}
                    {{-- </tr> --}}
                    @endforeach
                </tbody>                               
            </table>
        </div>
    </div>
    </div>

</div>
@endsection