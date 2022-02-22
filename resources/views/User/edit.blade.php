@extends('layouts3.app')
@section('content')	
<div class="wrapper">
    <div class="page-header page-header-xs settings-background" style="background-image: url('{{asset('assets2')}}/img/sections/joshua-earles.jpg');">
        <div class="filter"></div>
    </div>
    <div class="profile-content section">
        <div class="container">
            <div class="row">
                <div class="profile-picture">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new img-no-padding">
                            <img src="{{asset('assets2')}}/img/faces/clem-onojeghuo-2.jpg" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists img-no-padding"></div>
                        <div>
                            <span class="btn btn-outline-default btn-file btn-round"><span class="fileinput-new">Change Photo</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
                            <br />
                            <a href="#paper-kit" class="btn btn-link btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <form class="settings-form" method="post" action="{{route('ChinhSuaThongTin.update', $khachhang->idKhachhang)}}">
                            @method("PUT")
                            @csrf
                        <div class="form-group">
                            {{-- <input type="hidden" name="id_Khach_hang" value="{{$khachhang->idKhachhang}}"> --}}
                            <label>Tên Người Dùng</label>
                            <input type="text" name="Sua_ten_User"  class="form-control" value="{{$khachhang->nameKhachhang}}" >
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="Sua_email"  class="form-control" value="{{$khachhang->email}}">
                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu</label>
                            <input type="password" name="Sua_MatKhau"  class="form-control" value="{{$khachhang->passWord}}">
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh</label>
                            <input type="date" name="Sua_Ngay"  class="form-control" value="{{$khachhang->DoB}}">
                        </div>
                        <div class="form-group">
                            <label>Giới tính :</label>

                             @switch($khachhang->gioiTinh)
                                 @case(0)
                                 <input type="radio" name="Sua_Gioi_Tinh" value="1" > Nam 
                                 <input type="radio" name="Sua_Gioi_Tinh" value="0" checked> Nữ
                                     @break
                                 @case(1)
                                 <input type="radio" name="Sua_Gioi_Tinh" value="1" checked> Nam
                                 <input type="radio" name="Sua_Gioi_Tinh" value="0" > Nữ 
                                     @break
                                 @default
                                 <input type="radio" name="Sua_Gioi_Tinh" value="1" > Nam 
                                 <input type="radio" name="Sua_Gioi_Tinh" value="0" > Nữ 
                             @endswitch 
                           
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input type="text" name="Sua_Dia_chi"  class="form-control" value="{{$khachhang->diaChi}}">
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại</label>
                            <input type="text" name="Sua_SDT"  class="form-control" value="{{$khachhang->sdt}}">
                        </div>>
                      <div class="text-center">
                        <button type="submit" class="btn btn-wd btn-info btn-round">Cập Nhật</button>
                      </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer section-nude">
    <div class="container">
        <div class="row">
            <nav class="footer-nav">
                <ul>
                    <li><a href="https://www.creative-tim.com">Creative Tim</a></li>
                    <li><a href="http://blog.creative-tim.com">Blog</a></li>
                    <li><a href="https://www.creative-tim.com/license">Licenses</a></li>
                </ul>
            </nav>
            <div class="credits ml-auto">
                <span class="copyright">
                    © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
                </span>
            </div>
        </div>
    </div>
</footer>
@endsection