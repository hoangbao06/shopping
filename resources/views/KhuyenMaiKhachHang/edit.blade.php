@extends('layouts.app')
@section('content')	
<div class="card">
    {{-- sửa --}}
    <form method="post" action="{{route('KhuyenMaiKhachHang.update', $KhuyenMaiKhachHang->idKhuyenMai)}}"  >
        @method("PUT")
        @csrf
        <div class="card-header">
            <h4 class="card-title">
               Sửa Mã Khuyến Mãi
            </h4>
        </div>
        <div class="card-content">
            <div class="form-group">
                <label>Tên Mã Khuyến MÃi</label>
                <input type="text" name="Sua_ten_KM"  class="form-control" value="{{$KhuyenMaiKhachHang->nameKhuyenMai}}" >
            </div>
            <div class="form-group">
                <label>Mã Khuyến Mãi</label>
                <input type="text" name="Sua_Ma_KM"  class="form-control" value="{{$KhuyenMaiKhachHang->MakhuyenMai}}">
            </div>
            <div class="form-group">
                <label>Phần Trăm Giảm Giá</label>
                <input type="text" name="Sua_Phan_tram_KM"  class="form-control" value="{{$KhuyenMaiKhachHang->phanTramGiamGia}}">
            </div>
            <div class="form-group">
                <label>Số Lần Sử Dụng</label>
                <input type="text" name="Sua_solan_KM"  class="form-control" value="{{$KhuyenMaiKhachHang->solanKhuyenMai}}">
            </div>
            <div class="form-group">
                <div class="form-group">
                    <select class="selectpicker" data-style="btn btn-danger btn-block" title="Loại Khách Hàng" data-size="7" name="Sua_Loai_Khach">
                        @foreach ($PhanLoaiKhachHang as $phanloai)                                                                         
                        <option  value="{{$phanloai->idPhanLoai}}">{{$phanloai->namePhanLoai}}</option>               
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-info btn-fill btn-wd">Update </button>
        </div>
    </form>
</div> 
 @endsection