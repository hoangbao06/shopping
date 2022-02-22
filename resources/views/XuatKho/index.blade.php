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
                        <a href="{{ route('XuatKho.create') }}" class="btn btn-danger btn-fill btn-wd">Thêm Tình Trạng Xuất Kho</a>
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
                                    <th data-field="name" data-sortable="true">ID Sản Phẩm </th>
                                    <th data-field="name" data-sortable="true">Ảnh Sản Phẩm</th>
                                    <th data-field="name" data-sortable="true">Tên Sản Phẩm</th>
                                    <th data-field="name" data-sortable="true">Số Lượng</th>
                                    <th data-field="name" data-sortable="true">ID Tình trạng</th>
                                    <th data-field="name" data-sortable="true">Ngày Nhập</th>
                                    <th data-field="actions" class="td-actions text-center" data-events="operateEvents" data-formatter="operateFormatter">Actions</th>
                                </tr>
                 
                            </thead>
                            <?PHP 
                                $i = 1;
                            ?>
                            @foreach ($listXuatkho as $XuatKho)    
                            <tbody>
                                <tr>
                                    <td>{{ $XuatKho->idXuatKho }}</td>
                                    <td>{{$XuatKho->id_San_Pham2}}</td>
                                    <td><img src="{{$XuatKho->anh}}" style="width:100px;height:100px;border-radius: 20px" ></td>
                                    <td>{{$XuatKho->nameSanPham}}</td>
                                    <td>{{$XuatKho->soluong_XK}}</td>
                                    <td>{{$XuatKho->nameTinhTrangXuatNhap}}</td>
                                    <td>{{$XuatKho->NgayXuatKho}}</td>
                                   {{-- sửa --}}
                                   <td>
                                    <a href="{{ route('XuatKho.edit', $XuatKho->idXuatKho) }}" rel="tooltip" title="Sửa" class="btn btn-success btn-simple btn-xs">
                                        <i class="ti-pencil-alt"></i>
                                    </a>
                                </td>
                                    {{-- Xóa --}}
                                    <td>
                                        <form action="{{ route('XuatKho.destroy', $XuatKho->idXuatKho) }}" method="post">
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
                        {{$listXuatkho->appends([
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