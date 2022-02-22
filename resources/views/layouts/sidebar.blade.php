<div class="sidebar" data-background-color="brown" data-active-color="danger">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            CT
        </a>

        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
           My Admin
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="info">
                <div class="photo">
                    <img src="{{asset('assets')}}/img/faces/face-2.jpg" />
                </div>
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                       Chào  {{Session::get('name')}}
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="chucvu">
                                <span class="sidebar-mini">QL</span>
                                <span class="sidebar-normal">Quản Lý Chức vụ</span>
                            </a>
                        </li>
                        <li>
                            <a href="#settings">
                                <span class="sidebar-mini"></span>
                                <span class="sidebar-normal">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">

            <li>
                <a data-toggle="collapse" href="#Admin">
                    <i class="ti-user"></i>
                    <p>Admin
                       <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="Admin">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('Admin.index')}}">
                                <span class="sidebar-mini">NV</span>
                                <span class="sidebar-normal">Tài khoản Nhân Viên</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('Chucvu.index')}}">
                                <span class="sidebar-mini">CV</span>
                                <span class="sidebar-normal">Chức Vụ</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#SanPham">
                    <i class="ti-shopping-cart"></i>
                    <p>Sản Phẩm 
                       <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="SanPham">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('SanPham.index')}}">
                                <span class="sidebar-mini">SP</span>
                                <span class="sidebar-normal">Sản Phẩm</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('AnhSanPham.index')}}">
                                <span class="sidebar-mini">PT</span>
                                <span class="sidebar-normal">Ảnh Sản Phẩm</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('DanhMuc.index')}}">
                                <span class="sidebar-mini">DM</span>
                                <span class="sidebar-normal">Danh Mục</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('Trangthaisanpham.index')}}">
                                <span class="sidebar-mini">TT</span>
                                <span class="sidebar-normal">Trạng Thái Sản Phẩm</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#KhoHang">
                    <i class="ti-home"></i>
                    <p>Kho Hàng
                       <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="KhoHang">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('KhoHang.index')}}">
                                <span class="sidebar-mini">KH</span>
                                <span class="sidebar-normal">Kho</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('NhapKho.index')}}">
                                <span class="sidebar-mini">NK</span>
                                <span class="sidebar-normal">Nhập kho</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('XuatKho.index')}}">
                                <span class="sidebar-mini">XK</span>
                                <span class="sidebar-normal">Xuất kho</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('TinhTrangXuatNhap.index')}}">
                                <span class="sidebar-mini">TT</span>
                                <span class="sidebar-normal">Tình Trạng Kho</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#HoaDon">
                    <i class="ti-credit-card"></i>
                    <p>Hóa Đơn
                       <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="HoaDon">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('HoaDonThanhToan.index')}}">
                                <span class="sidebar-mini">HD1</span>
                                <span class="sidebar-normal">Hóa Đơn Chưa Duyệt </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('hoadondaduyet')}}">
                                <span class="sidebar-mini">HD2</span>
                                <span class="sidebar-normal">Hóa Đơn Đã Duyệt</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('TrangThaiHoaDon.index')}}">
                                <span class="sidebar-mini">TT</span>
                                <span class="sidebar-normal">Trạng Thái Hóa Đơn</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </li> 
            <li>
                <a data-toggle="collapse" href="#KhachHang">
                    <i class="ti-user"></i>
                    <p>Khách Hàng
                       <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="KhachHang">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('KhachHang.index')}}">
                                <span class="sidebar-mini">KH</span>
                                <span class="sidebar-normal">Thông Tin Khách Hàng</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('PhanLoaiKhachHang.index')}}">
                                <span class="sidebar-mini">PL</span>
                                <span class="sidebar-normal">Phân Loại Khách Hàng </span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </li>        
            <li>
                <a data-toggle="collapse" href="#DiaChi">
                    <i class="ti-location-arrow"></i>
                    <p>Địa Chỉ
                       <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="DiaChi">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('ThanhPho.index')}}">
                                <span class="sidebar-mini">TP</span>
                                <span class="sidebar-normal">Thành Phố</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('Quan.index')}}">
                                <span class="sidebar-mini">Q</span>
                                <span class="sidebar-normal">Quận</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('Phuong.index')}}">
                                <span class="sidebar-mini">P</span>
                                <span class="sidebar-normal">Phường</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#KhuyenMai">
                    <i class="ti-gift"></i>
                    <p>Khuyến Mãi
                       <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="KhuyenMai">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('KhuyenMaiKhachHang.index')}}">
                                <span class="sidebar-mini">KM</span>
                                <span class="sidebar-normal">Mã Khuyến Mãi</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('KhuyenMaiChiTiet.index')}}">
                                <span class="sidebar-mini">CT</span>
                                <span class="sidebar-normal">Chi Tiết Khuyến Mãi</span>
                            </a>
                        </li>
                    </ul>
                </div> 
                <li>
                    <a data-toggle="collapse" href="#Thongke">
                        <i class="ti-stats-up"></i>
                        <p>Thống Kê
                           <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="Thongke">
                        <ul class="nav">
                            <li>
                                <a href="{{ route('ThongkeSL')}}">
                                    <span class="sidebar-mini">SL</span>
                                    <span class="sidebar-normal">Thống Kê Doanh Thu</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('SPbanchay')}}">
                                    <span class="sidebar-mini">SP</span>
                                    <span class="sidebar-normal">Sản Phẩm Bán Chạy</span>
                                </a>
                            </li>
                        </ul>
                    </div>          
        </ul>
        
    </div>
</div>