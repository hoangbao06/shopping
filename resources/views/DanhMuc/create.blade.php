@extends('layouts.app')
@section('content')	
<div class="card">
    {{-- thêm sử POSt --}}
    <form method="post" action="{{route('DanhMuc.store')}}">
        @csrf
        <div class="card-header">
            <h4 class="card-title">
                thêm Tên Danh Mục 
            </h4>
        </div>
        <div class="card-content">
            <div class="form-group">
                <label> Tên Danh Mục </label>
                <input type="text" name="ten_Danh_muc"  class="form-control">
            </div>
            <button type="submit" class="btn btn-fill btn-info">Submit</button>
        </div>
    </form>
</div> 
 @endsection