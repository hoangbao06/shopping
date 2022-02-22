@extends('layouts.app')
@section('content')	
<div class="card">
    {{-- thêm sử POSt --}}
    <form method="post" action="{{route('Trangthaisanpham.store')}}">
        @csrf
        <div class="card-header">
            <h4 class="card-title">
                thêm Trạng Thái Sản phẩm 
            </h4>
        </div>
        <div class="card-content">
            <div class="form-group">
                <label>Tên Trạng Thái Sản Phẩm</label>
                <input type="text" name="ten_Trang_thai_san_pham"  class="form-control">
            </div>
            <button type="submit" class="btn btn-fill btn-info">Submit</button>
        </div>
    </form>
</div> 
 @endsection