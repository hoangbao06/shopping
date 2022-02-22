@extends('layouts.app')
@section('content')	

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- thêm sử POSt --}}
                    <form method="post" action="{{route('AnhSanPham.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <Div class="text-center">
                                <h4 class="card-title">
                                    Thêm Ảnh Sản Phẩm
                                 </h4>
                            </Div>
                        </div>
                        <div class="card-content">
                            <div class="form-group">
                                <Div class="text-center">
                                    <label> Ảnh Sản Phẩm</label>
                                    <input type="file" name="Anh_San_pham"  class="form-control">
                                </Div>
                                {{-- <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                  <div class="fileinput-new thumbnail img-no-padding" style="max-width: 370px; max-height: 250px;">
                                    <img src="{{asset('assets2')}}/img/image_placeholder.jpg" alt="...">
                                  </div>
                                  <div class="fileinput-preview fileinput-exists thumbnail img-no-padding" style="max-width: 370px; max-height: 250px;"></div>
                                  <div>
                                    <span class="btn btn-outline-default btn-round btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
                                    <a href="#paper-kit" class="btn btn-link btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                  </div>
                                </div> --}}
                            <div class="form-group">
                                <Div class="text-center">
                                    <label>ID Sản Phẩm</label>
                                    <input type="text" name="id_San_Pham"  class="form-control">
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
                        <input type="hidden" value="{{$search}}" name="search" class="form-control" placeholder="Search...">
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
                                    <th data-field="name" data-sortable="true">ID Sản Phẩm </th>
                                    <th data-field="actions" class="td-actions text-center" data-events="operateEvents" data-formatter="operateFormatter">Actions</th>
                                </tr>
                 
                            </thead>
                            <?PHP 
                                $i = 1;
                            ?>
                            @foreach ($listAnh  as $Anh)    
                            <tbody>
                                <tr>
                                    <td><?PHP  echo($i++) ?></td>
                                    <td><img src="{{ $Anh->anhsanPham}}" style="width:180px;height:200px;border-radius: 20px" ></td>
                                    <td>{{$Anh->id_SanPham}}</td>
                                   {{-- sửa --}}
                                    <td><a class="btn btn-fill btn-info" href="{{ route('AnhSanPham.edit', $Anh->idAnh) }}">Sửa</a></td>
                                    {{-- Xóa --}}
                                    <td>
                                        <form action="{{ route('AnhSanPham.destroy',$Anh->idAnh) }}" method="post">
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
                        {{$listAnh->appends([
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