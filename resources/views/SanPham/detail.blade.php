@extends('layouts.app')
@section('content')	


<div class="content">
    <div class="container-fluid">
        <form  method="post" action="{{route('AnhSanPham.store')}}"   enctype="multipart/form-data">
            @csrf
            <div class="card-header">
                <h4 class="card-title">
                    thêm Ảnh Sản phẩm
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Ảnh Sản phẩm</label>
                    <input type="file" name="Anh_San_pham"  class="form-control">
                </div>
                <div class="form-group">
                    <label>ID Sản Phẩm</label>
                    <input type="text" name="id_San_Pham"  class="form-control" value="{{$idSanPham }}">
                </div>
                <button type="submit" class="btn btn-fill btn-info">Submit</button>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content table-responsive table-full-width">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">ID Sản Phẩm</th>
                                    <th class="text-center">Ảnh </th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                           @foreach ($anhSanPham as $anh)                                          
                            <tbody>
                                <td class="text-center">{{ $anh->id_SanPham}}</td>
                                <td class="text-center"><img src="{{ URL::to($anh->anhsanPham) }}" width="350px"></td>          
                                    <td><a class="btn btn-fill btn-info" href="{{ route('AnhSanPham.edit', $anh->idAnh) }}">Sửa</a></td>
                                    <td>
                                        <form action="{{ route('AnhSanPham.destroy', $anh->idAnh) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" name="id-san-pham" value="{{$idSanPham }}">
                                            <button class="btn btn-fill btn-info">xóa</button>
                                        </form>
                                    </td>
                                </tr>                                                                        
                            </tbody>    
                            @endforeach
                        </table>                                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection