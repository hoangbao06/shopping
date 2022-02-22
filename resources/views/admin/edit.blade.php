@extends('layouts.app')
@section('content')	
<div class="card">
    {{-- sửa --}}
    <form method="post" action="{{route('Admin.update', $admin->idNhanVien)}}">
        @method("PUT")
        @csrf
        <div class="card-header">
            <h4 class="card-title">
               Sửa tài khoản Admin
            </h4>
        </div>
        <div class="card-content">
            <div class="form-group">
                <label>Tên Nhân Viên</label>
                <input type="text" name="Sua_ten_NhanVien"  class="form-control" value="{{$admin->nameNhanVien}}" >
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="Sua_email"  class="form-control" value="{{$admin->email}}">
            </div>
            <div class="form-group">
                <label>Mật Khẩu</label>
                <input type="text" name="Sua_MatKhau"  class="form-control" value="{{$admin->passWord}}">
            </div>
            <div class="form-group">
                <div class="form-group">
                    <select class="selectpicker" data-style="btn btn-danger btn-block" title="Chức Vụ" data-size="7" name="quyen_chuc_vu">
                        <option value="{{$admin->idChucVu}}" selected>{{$admin->nameChucvu}}</option>
                        @foreach ($quyen as $Quyen)                                                                        
                        <option value="{{$Quyen->idChucVu}}">{{$Quyen->nameChucvu}}</option>               
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