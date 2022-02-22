@extends('layouts.app')
@section('content')	

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- thêm  --}}
                    <div class="text-center">
                        <form class="navbar-form  navbar-search-form" role="search">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                {{-- <input type="text" value="{{$search}}" name="search" class="form-control" placeholder="Search..."> --}}
                            </div>
                        </form>
                        </div>
                <div class="card">
                    <div class="card-content">
                        <div class="toolbar">
                            <!--Here you can write extra buttons/actions for the toolbar-->
                        </div>
                        <table id="bootstrap-table" class="table">
                            <thead>
                                <tr>
                                    <th data-field="id" class="text-left"> STT</th>
                                    <th data-field="name" data-sortable="true">Tên Sản Phẩm</th>
                                    <th>Giá Sản Phẩm</th>
                                    <th>Số Lượng Mua</th>
                                    <th>Tên Khách Hàng </th>
                                    <th>Địa Chỉ Giao Đến </th>

                                </tr>
                 
                            </thead>
                            <?PHP 
                                $i = 1;
                            ?>
                            @foreach ($chitiethoadon as $ChiTietHoaDon)    
                            <tbody>
                                <tr>
                                    <td><?PHP  echo($i++) ?></td> 
                                    <td>{{$ChiTietHoaDon->nameSanPham}}</td>
                                    {{-- {{number_format($ChiTietHoaDon->gia_SP, 0, ".",".")}} --}}
                                    <td>{{number_format($ChiTietHoaDon->gia_SP, 0, ".",".")}}</td>
                                    <td>{{$ChiTietHoaDon->SoLuong_HDCT}}</td>
                                    <td>{{$ChiTietHoaDon->nameKhachhang}}</td>
                                    <td>{{$ChiTietHoaDon->diaChi}}</td>
                                    {{-- <td><input type="tel" value="{{$HoaDon->idTrangThaiHoaDon}}" name="Trang_Thai"></td> --}}
                                    <td></td> 
    
                                </tr>                                    
                            </tbody>
                            @endforeach
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><b>Tổng Thiệt Hại:</b></td>
                
                                    <td>{{number_format( $tongtien , 0, ".",".")}}VNĐ</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-center">
                        {{$chitiethoadon->appends([
                            'search' => $search
                        ])->links() }}
                        </div>
                    </div>
                </div><!--  end card  -->
            </div> <!-- end col-md-12 -->
        </div> <!-- end row -->
    </div>
</div>
 @endsection