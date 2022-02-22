@extends('layouts.app')
@section('content')	
<div class="card">
    {{-- thêm sử POSt --}}
    <form  method="post" action="{{route('AnhSanPham.store')}}"   enctype="multipart/form-data">
        @csrf
        <div class="card-header">
            <h4 class="card-title">
                thêm Ảnh Sản phẩm
            </h4>
        </div>
        <div class="card-content">
            {{-- <div class="form-group">
                <label>Ảnh Sản phẩm</label>
                <input type="file" name="Anh_San_pham"  class="form-control">
            </div> --}}
            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                <div class="fileinput-new thumbnail img-no-padding" style="max-width: 370px; max-height: 250px;">
                  <img src="{{asset('assets2')}}/img/image_placeholder.jpg" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail img-no-padding" style="max-width: 370px; max-height: 250px;"></div>
                <div>
                  <span class="btn btn-outline-default btn-round btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
                  <a href="#paper-kit" class="btn btn-link btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                </div>
              </div>
            <div class="form-group">
                <label>ID Sản Phẩm</label>
                <input type="text" name="id_San_Pham"  class="form-control" value="">
            </div>
            <button type="submit" class="btn btn-fill btn-info">Submit</button>
        </div>
    </form>
</div> 
 @endsection