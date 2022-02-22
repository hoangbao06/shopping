@extends('layouts.app')
@section('content')	
<div class="card">
    {{-- sửa --}}
    <form method="post" action="{{route('TrangThaiHoaDon.update',$trangthaihoadon->idTrangThai)}}">
        @method("PUT")
        @csrf
        <div class="card-header">
            <Div class="text-center">
                <h4 class="card-title">
                    Sửa tên Trạng thái Hóa Đơn
                </h4>
            </Div>
        </div>
        <div class="card-content">
            <div class="form-group">
                <Div class="text-center">
                    <label>Tên Trạng thái Hóa Đơn</label>
                    <input type="text" name="Sua_Trang_thai_Hoa_Don"  class="form-control" value="{{$trangthaihoadon->nameTrangThai}}">
                </Div>
            </div>
            <Div class="text-center">
                <button type="submit" class="btn btn-fill btn-info">Sửa</button>
            </Div>
        </div>
    </form>
</div> 
 @endsection