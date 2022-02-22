@extends('layouts.app')
@section('content')	

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- thêm sử POSt --}}
                    <form method="post" action="{{route('Trangthaisanpham.store')}}">
                        @csrf
                        <div class="card-header">
                            <Div class="text-center">
                                <h4 class="card-title">
                                    thêm Trạng Thái Sản Phẩm
                                </h4>
                            </Div>
                        </div>
                        <div class="card-content">
                            <div class="form-group">
                                <Div class="text-center">
                                    <label>Tên Trạng Thái Sản Phẩm</label>
                                    <input type="text" name="ten_Trang_thai_san_pham"  class="form-control">
                                </Div>
                            </div>
                            <Div class="text-center">
                                <button type="submit" class="btn btn-fill btn-info">Submit</button>
                            </Div>
                        </div>
                    </form>
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
                                    <th data-field="name" data-sortable="true">Name</th>
                                    <th data-field="actions" class="td-actions text-center" data-events="operateEvents" data-formatter="operateFormatter">Actions</th>
                                </tr>
                 
                            </thead>
                            <?PHP 
                                $i = 1;
                            ?>
                            @foreach ($listTrangthai  as $Trangthai)    
                            <tbody>
                                <tr>
                                    <td><?PHP  echo($i++) ?></td>
                                    <td>{{$Trangthai->nameTrangThai_SanPham}}</td>
                                   {{-- sửa --}}
                                    <td><a class="btn btn-fill btn-info" href="{{ route('Trangthaisanpham.edit', $Trangthai->idTrangThai_SanPham) }}">Sửa</a></td>
                                    {{-- Xóa --}}
                                    <td>
                                        <form action="{{ route('Trangthaisanpham.destroy', $Trangthai->idTrangThai_SanPham) }}" method="post">
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
                        {{$listTrangthai->appends([
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