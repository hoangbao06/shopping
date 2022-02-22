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
                        <a href="{{ route('SanPham.create') }}" class="btn btn-danger btn-fill btn-wd">Thêm Sản Phẩm</a>
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
                                    <th data-field="name" data-sortable="true">Name</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>quantily</th>
                                    <th>category</th>
                                    <th>Status</th>
                                    <th data-field="actions" class="td-actions text-center" data-events="operateEvents" data-formatter="operateFormatter">Actions</th>
                                </tr>
                 
                            </thead>
                            <?PHP 
                                $i = 1;
                            ?>
                            @foreach ($sanpham  as $SanPham)    
                            <tbody>
                                <tr>
                                    <td><?PHP  echo($i++) ?></td>
                                    <td>{{$SanPham->nameSanPham}}</td>          
                                    <td>{{number_format($SanPham->gia_SP , 0, ".",".")}}</td>
                                    <td><img src="{{ $SanPham->anh}}" style="width:100px;height:100px;border-radius: 20px" ></td>
                                    <td>{{$SanPham->SoLuong}}</td>
                                    <td>{{$SanPham->nameDanhMuc}}</td>
                                    <td>{{$SanPham->nameTrangThai_SanPham}}</td>
                                    <td><a class="btn btn-fill btn-info" href="{{ route('SanPham.show', $SanPham->idSanPham) }}">Xem Chi Tiết </a></td>
                                    {{-- <td>
                                        <form action="{{ route('AnhSanPham.create') }}" method="get">
                                            @csrf
                                            <input type="hidden" name="id-san-pham" value="{{ $SanPham->idSanPham}}">
                                            <button class="btn btn-fill btn-info">Thêm Ảnh</button>
                                        </form>
                                    </td> --}}
                                   {{-- sửa --}}
                                   <td><a class="btn btn-fill btn-info" href="{{ route('SanPham.edit', $SanPham->idSanPham) }}">Sửa</a></td>
                                    {{-- Xóa --}}
                                    <td>
                                        <form action="{{ route('SanPham.destroy', $SanPham->idSanPham) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-fill btn-info" onclick="alert('Bạn có Muốn Xóa Sản Phẩm Này Không ');">xóa</button>
                                        </form>
                                    </td>
                                </tr>                                    
                            </tbody>
                            @endforeach
                        </table>
                        <div class="text-center">
                        {{$sanpham->appends([
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