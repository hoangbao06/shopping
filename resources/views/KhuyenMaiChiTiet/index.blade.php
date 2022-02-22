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
                        <a href="{{ route('KhuyenMaiChiTiet.create') }}" class="btn btn-danger btn-fill btn-wd">Thêm Chi Tiết Khuyến Mãi</a>
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
                                    <th data-field="name" data-sortable="true">Tên Khách Hàng</th>
                                    <th>Mã Khuyến Mãi</th>
                                    <th>Ngày Sử Dụng </th>
                                    <th>Số Lần Sử Dụng </th>
                               
                                    <th data-field="actions" class="td-actions text-center" data-events="operateEvents" data-formatter="operateFormatter">Actions</th>
                                </tr>
                 
                            </thead>
                            <?PHP 
                                $i = 1;
                            ?>
                            @foreach ($KhuyenmaiChiTiet  as $KhuyenMaiDeatil)    
                            <tbody>
                                <tr>
                                    <td><?PHP  echo($i++) ?></td>
                                    <td>{{$KhuyenMaiDeatil->nameKhachhang}}</td>
                                    <td>{{$KhuyenMaiDeatil->MakhuyenMai}}</td>
                                    <td>{{$KhuyenMaiDeatil->NgaySuDung}}</td>
                                    <td>{{$KhuyenMaiDeatil->solanKhuyenMai}}</td>
                                   {{-- sửa --}}
                                   <td><a class="btn btn-fill btn-info" href="{{ route('KhuyenMaiChiTiet.edit', $KhuyenMaiDeatil->idKhuyenMaiDetail) }}">Sửa</a></td>
                                    {{-- Xóa --}}
                                    <td>
                                        <form action="{{ route('KhuyenMaiChiTiet.destroy', $KhuyenMaiDeatil->idKhuyenMaiDetail) }}" method="post">
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
                        {{$KhuyenmaiChiTiet->appends([
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