@extends('layouts.app')
@section('content')	

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- thêm  --}}
                    <div class="text-right">
                        <br>
                        <a href="{{ route('KhuyenMaiKhachHang.create') }}" class="btn btn-danger btn-fill btn-wd">Thêm Mã Khuyến Mãi</a>
                    </div>
                    <div class="text-center">
                        <form class="navbar-form  navbar-search-form" role="search">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input type="text" value="{{$search}}" name="search" class="form-control" placeholder="Search...">
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
                                    <th data-field="name" data-sortable="true">Tên</th>
                                    <th>Mã Khuyến Mãi</th>
                                    <th>Phần Trăm </th>
                                    <th>Số Lần </th>
                                    <th>Loại Khách Hàng</th>
                                    <th data-field="actions" class="td-actions text-center" data-events="operateEvents" data-formatter="operateFormatter">Actions</th>
                                </tr>
                 
                            </thead>
                            <?PHP 
                                $i = 1;
                            ?>
                            @foreach ($Khuyenmaikhachhang  as $KhuyenMai)    
                            <tbody>
                                <tr>
                                    <td><?PHP  echo($i++) ?></td>
                                    <td>{{$KhuyenMai->nameKhuyenMai}}</td>
                                    <td>{{$KhuyenMai->MakhuyenMai}}</td>
                                    <td>{{$KhuyenMai->phanTramGiamGia}}%</td>
                                    <td>{{$KhuyenMai->solanKhuyenMai}}</td>
                                    <td>{{$KhuyenMai->namePhanLoai}}</td>
                                    {{-- <td><a class="btn btn-fill btn-info" href="{{ route('SanPham.show', $SanPham->idSanPham) }}">Xem Chi Tiết </a></td> --}}
                                   {{-- sửa --}}
                                   <td><a class="btn btn-fill btn-info" href="{{ route('KhuyenMaiKhachHang.edit', $KhuyenMai->idKhuyenMai) }}">Sửa</a></td>
                                    {{-- Xóa --}}
                                    <td>
                                        <form action="{{ route('KhuyenMaiKhachHang.destroy', $KhuyenMai->idKhuyenMai) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-fill btn-info">xóa</button>
                                        </form>
                                    </td>
                                </tr>                                    
                            </tbody>
                            @endforeach
                        </table>
                        <div class="text-center">
                        {{$Khuyenmaikhachhang->appends([
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