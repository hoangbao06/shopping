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
            <h4 class="title">Giỏ hàng</h4>
        </div>
        <div class="col-md-4"></div>
        

    </div>
    <div class="row">
        <div class="col-md-10 ml-auto mr-auto">
        <div class="table-responsive">
            <table class="table table-shopping">
                <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th></th>

                        <th class="text-center">Price</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>
                
                <tbody>  
                    @foreach ($hoadonchitiet as $HoaDonChiTIet)            
                    <tr>
                       <td hidden><strong>{{$HoaDonChiTIet->id_San_Pham }}</strong></td>
                        <td>
                            <div class="img-container">
                                <img src="{{$HoaDonChiTIet->anh}}" alt="Agenda">
                            </div>
                        </td>
                        <td class="td-product">
                            <strong>{{$HoaDonChiTIet->nameSanPham}}</strong>
                        </td>
                      

                        <td class="td-price" >
                            {{-- {{number_format($HoaDonChiTIet->gia_SP , 0, ".",".")}} --}}
                            <small >{{number_format($HoaDonChiTIet->gia_SP , 0, ".",".")}}  VNĐ</small>
            
                        </td>
                        <input type="hidden" value="{{$HoaDonChiTIet->id_Hoadon}}" name="id_HoaDon">
                        <td class="td-number text-center">
                            {{$HoaDonChiTIet->SoLuong_HDCT}}
                            <div class="btn-group">
                                 <a href="{{ route('giamSoLuongSanPhamGioHang',['idHoaDonChiTiet' => $HoaDonChiTIet->idHoaDonChiTiet]) }}" class="btn btn-sm btn-border btn-round"> - </a>
                                 <a href="{{ route('tangSoLuongSanPhamGioHang',['idHoaDonChiTiet' => $HoaDonChiTIet->idHoaDonChiTiet])}}" class="btn btn-sm btn-border btn-round"> + </a>
                            </div>
                        </td>
                        <td class="td-number">
                            
                            <small>{{number_format($HoaDonChiTIet->TongTien , 0, ".",".")}} VNĐ</small>
                        </td>
                        <td>
                            <form action="{{ route('HoaDonChiTiet.destroy',$HoaDonChiTIet->idHoaDonChiTiet) }}" method="post" rel="tooltip" title="Xóa"  >
                               @method('DELETE')
                                @csrf
                                <button onclick="return confirm('Bạn Có Muốn Xóa Sẩn Phẩm Này Không ?');"><i class="fa fa-window-close-o"></i></button>
                            </form>    
                        </td>
                    </tr>
                    {{-- <tr> --}}
                {{-- <td> <button type="button" class="btn btn-info btn-l">Complete Purchase <i class="fa fa-chevron-right"></i></button></td>
                <td></td> --}}
                    {{-- </tr> --}}
                    @endforeach
                </tbody>    
                <form method="POST" action="{{route('HoaDonThanhToan.store')}}">
                    @csrf
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2"><b><h4>Tổng Tiền Phải Thanh Toán:</h4></b></td>
                        <td><h2>{{number_format($tongTienHoaDon , 0, ".",".")}} VNĐ</h2></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>                              
                <tr class="tr-actions">
                    <td colspan="3"></td>
                    <td colspan="2" class="text-right">
                        <button type="submit" class="btn btn-danger btn-lg">Thanh Toán<i class="fa fa-chevron-right"></i></button>
                    </td>
                </tr>
            </form>	
            </table>
        </div>
    </div>
    </div>

</div>
@endsection