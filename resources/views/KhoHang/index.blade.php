@extends('layouts.app')
@section('content')	
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- thêm sử POSt --}}
                    <div class="text-right">
                        <br>
                        <a href="{{ route('DuyetKhoHang.index') }}" class="btn btn-danger btn-fill btn-wd">Danh Sách Kho chưa duyệt</a>
                    </div>
                {{-- tìm kiếm --}}
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
                                    <th data-field="name" data-sortable="true">Ảnh Sản Phẩm</th>
                                    <th data-field="name" data-sortable="true">Tên Sản Phẩm</th>
                                    <th data-field="name" data-sortable="true">Số Lượng</th>
                                    <th data-field="name" data-sortable="true">Tình trạng</th>
                                    <th data-field="actions" class="td-actions text-center" data-events="operateEvents" data-formatter="operateFormatter">Actions</th>
                                </tr>
                 
                            </thead>
                            <?PHP 
                                $i = 1;
                            ?>
                            @foreach ($listkhohang  as $KhoHang)    
                            <tbody>
                                <tr>
                                    <td>{{$KhoHang->idKhoHang}}</td>
                                    <td><img src="{{$KhoHang->anh}}" style="width:100px;height:100px;border-radius: 20px" ></td>
                                    <td>{{$KhoHang->nameSanPham}}</td>
                                    <td>{{$KhoHang->SoLuong_KH}}</td>
                                    <td>{{$KhoHang->nameTrangThai_SanPham}}</td>
                                    {{-- <td>{{$KhoHang->soluong_XK}}</td>
                                    <td>{{$KhoHang->SoLuong_NK}}</td> --}}
                                   {{-- sửa --}}
                                   
                                    {{-- Xóa --}}
                                    



                                    <td class="td-actions text-right">
                                       
                                        <form action="{{ route('XuatKho.create') }}" method="get">
                                            <input type="hidden" name="idKhoHang" value="{{  $KhoHang->idKhoHang}}">
                                            <input type="hidden" name="idSanPham" value="{{  $KhoHang->idSanPham}}">
                                            <button><i class="ti-user" title="Xuất Kho"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('KhoHang.edit',  $KhoHang->idKhoHang) }}" method="post" rel="tooltip" title="Sửa" class="btn btn-success btn-simple btn-xs">
                                            <i class="ti-pencil-alt"></i>
                                        </a>
                                    </td>
                                        <td>
                                        <form action="{{ route('KhoHang.destroy',$KhoHang->idKhoHang) }}" method="post" rel="tooltip" title="Xóa" class="btn btn-danger btn-simple btn-xs" >
                                            @method('DELETE')
                                            @csrf
                                            <button><i class="ti-close"></i></button>
                                        </form>    
                                    </td>
                                </tr>                                    
                            </tbody>
                            @endforeach
                        </table>
                        <div class="text-center">
                        {{$listkhohang->appends([
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