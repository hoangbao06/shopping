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
                                <span class="input-group-addon"><h5>Những Sản Phẩm Bán Chạy Nhất</h5></span>
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
                                    <th data-field="name" data-sortable="true" class="text-center">Tên Sản Phẩm</th>
                                    <th data-field="name" data-sortable="true" class="text-center">Tổng Số Lượng đã bán</th>
                                    <th data-field="actions" class="text-center"  data-events="operateEvents" data-formatter="operateFormatter" >Actions</th>
                                </tr>
                 
                            </thead>
                            <?PHP 
                            $i = 1;
                            ?>
                            @foreach ($SPbanchay as $SP_Ban_Chay)
                            <tbody>
                                <tr>
                                    <td class="text-center"><?PHP  echo($i++) ?></td>
                                    <td class="text-center">{{$SP_Ban_Chay->nameSanPham}}</td>
                                    <td class="text-center">{{$SP_Ban_Chay->SoLuong_HDCT}}</td>
                                    <td class="text-center"><a href="{{ route('ChiTietSP',['sanpham' => $SP_Ban_Chay->nameSanPham]) }}"><button class="btn btn-fill btn-info text-center">Chi Tiết Sản Phẩm </button></a></td>
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