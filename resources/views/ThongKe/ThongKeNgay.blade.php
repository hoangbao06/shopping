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
                                    <th data-field="name" data-sortable="true" class="text-center">STT</th>
                                    <th data-field="name" data-sortable="true" class="text-center">Tên Khách hàng</th>
                                    <th data-field="name" data-sortable="true" class="text-center">Tên Sản Phẩm</th>
                                    <th data-field="name" data-sortable="true" class="text-center">Giá Sản Phẩm</th>
                                    <th data-field="name" data-sortable="true" class="text-center">Số Lượng Mua</th>
                                    <th data-field="name" data-sortable="true" class="text-center">Ngày Mua</th>
                                    <th data-field="name" data-sortable="true" class="text-center">Tổng Thanh Toán</th>
                                </tr>
                 
                            </thead>
                                <?PHP 
                                $i = 1;
                                ?>
                               @foreach ($chitietngay as $ChiTietNgay)
                            <tbody>
                                <tr>
                                    <td class="text-center"><?PHP  echo($i++) ?></td> 
                                    <td class="text-center">{{$ChiTietNgay->nameHoaDon}}</td>
                                    <td class="text-center">{{$ChiTietNgay->nameSanPham}}</td>
                                    <td class="text-center">{{number_format($ChiTietNgay->gia_SP, 0, ".",".")}} VNĐ</td>
                                    <td class="text-center">{{$ChiTietNgay->SoLuong_HDCT}}</td>
                                     <td class="text-center">{{$ChiTietNgay->ngayDat}}</td>
                                    <td class="text-center">{{number_format($ChiTietNgay->thanhtien, 0, ".",".")}} VNĐ</td>
                                    <!-- 100.000,00-->
                                   
                                </tr>                                    
                            </tbody>     
                            @endforeach
                        </table>
                        <div class="text-center">
                        {{-- {{$hoadon->appends([
                            'search' => $search
                        ])->links() }} --}}
                        </div>
                    </div>
                </div><!--  end card  -->
            </div> <!-- end col-md-12 -->
        </div> <!-- end row -->
    </div>
</div>
 @endsection