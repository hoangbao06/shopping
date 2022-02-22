@extends('layouts.app')
@section('content')	

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- thêm  --}}
                    {{-- <div class="text-right">
                        <br>
                        <a href="{{ route('Admin.create') }}" class="btn btn-danger btn-fill btn-wd">Create Account</a>
                    </div>
                    <div class="text-center">
                        <form class="navbar-form  navbar-search-form" role="search">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input type="text" value="{{$search}}" name="search" class="form-control" placeholder="Search...">
                            </div>
                        </form>
                        </div> --}}
                <div class="card">
                    <div class="card-content">
                        <div class="toolbar">
                            <!--Here you can write extra buttons/actions for the toolbar-->
                        </div>
                        <table id="bootstrap-table" class="table">
                            <thead>
                                <tr>
                                    <th data-field="id" class="text-left"> STT</th>
                                    <th data-field="name" data-sortable="true">Name</th>
                                    <th>Email</th>
                                    {{-- <th>Password</th> --}}
                                    <th>Ngày Sinh</th>
                                    <th>Giới Tính</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Loại Khách Hàng</th>
                                    <th data-field="actions" class="td-actions text-center" data-events="operateEvents" data-formatter="operateFormatter">Actions</th>
                                </tr>
                 
                            </thead>
                            <?PHP 
                                $i = 1;
                            ?>
                            @foreach ($khachhang  as $KhachHang)    
                            <tbody>
                                <tr>
                                    <td><?PHP  echo($i++) ?></td>
                                    <td>{{$KhachHang->nameKhachhang}}</td>
                                    <td>{{$KhachHang->email}}</td>
                                    {{-- <td>{{$KhachHang->passWord}}</td> --}}
                                    <td>{{$KhachHang->DoB}}</td>
                                    <td>{{$KhachHang->gioiTinh  == 1 ? "nam" : "nữ" }}</td>
                                    <td>{{$KhachHang->diaChi}}</td>
                                    <td>{{$KhachHang->sdt}}</td>
                                    <td>{{$KhachHang->namePhanLoai}}</td>
                                    {{-- @foreach ($hanloaiKhach as $phanLoai)
                                    <td>{{$phanLoai->namePhanLoai}}</td>
                                    @endforeach --}}
                                   {{-- sửa --}}
                                   <td><a class="btn btn-fill btn-info" href="{{ route('KhachHang.edit', $KhachHang->idKhachhang) }}">Sửa</a></td>
                                    {{-- Xóa --}}
                                    <td>
                                        <form action="{{ route('KhachHang.destroy', $KhachHang->idKhachhang) }}" method="post">
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
                        {{$khachhang->appends([
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