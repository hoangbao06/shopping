@extends('layouts.app')
@section('content')	
<div class="card">
    {{-- thêm sử POSt --}}
    <form  action="{{route('TinhTrangXuatNhap.store')}}">
        @csrf
        <div class="card-header">
            <Div class="text-center">
                <h4 class="card-title">
                    thêm Tên Tình Trạng 
                </h4>
            </Div>
        </div>
        <div class="card-content">
            <div class="form-group">
                <label> Tên Tình Trạng </label>
                <input type="text" name="ten_Tinh_trang"  class="form-control">
            </div>
            <button type="submit" class="btn btn-fill btn-info">Submit</button>
        </div>
    </form>
</div> 
 @endsection