@extends('layouts.app')
@section('content')	
<div class="card">
    {{-- sửa --}}
    <form method="post" action="{{route('KhachHang.update', $khachhang->idKhachhang)}}">
        @method("PUT")
        @csrf
        <div class="card-header">
            <h4 class="card-title">
               Sửa Thông tin Người Dùng 
            </h4>
        </div>
        <div class="card-content">
            <div class="form-group">
                <label>Tên Người Dùng</label>
                <input type="text" name="Sua_ten_User"  class="form-control" value="{{$khachhang->nameKhachhang}}" >
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="Sua_email"  class="form-control" value="{{$khachhang->email}}">
            </div>
            <div class="form-group">
                <label>Mật Khẩu</label>
                <input type="text" name="Sua_MatKhau"  class="form-control" value="{{$khachhang->passWord}}">
            </div>
            <div class="form-group">
                <label>Ngày sinh</label>
                <input type="date" name="Sua_Ngay"  class="form-control" value="{{$khachhang->DoB}}">
            </div>
            <div class="form-group">
                <label>Giới tính</label>
                <input type="text" name="Sua_Gioi_Tinh"  class="form-control" value="{{$khachhang->gioiTinh == 1 ? "nam" : "nữ" }}">
            </div>
            <div class="form-group">
                <label>Địa Chỉ</label>
                <input type="text" name="Sua_Dia_chi"  class="form-control" value="{{$khachhang->gioiTinh}}">
            </div>
            <div class="form-group">
                <label>Số Điện Thoại</label>
                <input type="text" name="Sua_SDT"  class="form-control" value="{{$khachhang->sdt}}">
            </div>
            <div class="form-group">
                <div class="form-group">
                    <select class="selectpicker" data-style="btn btn-danger btn-block" title="loại Khach Hàng" data-size="7" name="id_Khach_hang">
                        @foreach ($phanloai as $PhanLoai)                                                                        
                        <option value="{{$PhanLoai->idPhanLoai}}">{{$PhanLoai->namePhanLoai}}</option>               
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