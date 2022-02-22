<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\anhSanPham2;
use App\Http\Controllers\authenticateController;
use App\Http\Controllers\authenticateUser;
use App\Http\Controllers\ChinhSuaThongTinController;
use App\Http\Controllers\ChiTietHD2;
use App\Http\Controllers\ChiTietHoaDon;
use App\Http\Controllers\ChiTietHoaDon2;
use App\Http\Controllers\ChiTietSP;
use App\Http\Controllers\ChucVucontroller;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DuyetHoaDon;
use App\Http\Controllers\DuyetKhoHang;
use App\Http\Controllers\HoaDonChiTietController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\KhoHangcontronller;
use App\Http\Controllers\KhuyenMaiDetailController;
use App\Http\Controllers\KhuyenMaiKhachHangController;
use App\Http\Controllers\lichsudonhang;
use App\Http\Controllers\NhapKho2;
use App\Http\Controllers\NhapKhoController;
use App\Http\Controllers\PhanLoaiController;
use App\Http\Controllers\PhuongController;
use App\Http\Controllers\QuanController;
use App\Http\Controllers\quanlysanpham;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\SPBanChay;
use App\Http\Controllers\SPchitietController;
use App\Http\Controllers\tangGiamSoLuongSanPhamGioHang;
use App\Http\Controllers\ThanhPhoController;
use App\Http\Controllers\ThongKeDoanhThu;
use App\Http\Controllers\ThongKeNgay;
use App\Http\Controllers\ThongKeSL;
use App\Http\Controllers\TinhTrangXuatNhapController;
use App\Http\Controllers\viewAdmin;
use App\Http\Controllers\trangchu;
use App\Http\Controllers\TrangChuController;
use App\Http\Controllers\TrangThaiHoaDon;
use App\Http\Controllers\TrangThaiHoaDonController;
use App\Http\Controllers\TrangThaiSanPham;
use App\Http\Controllers\TrangThaiSanPhamController;
use App\Http\Controllers\TrangThaiSanPhamCoontroller;
use App\Http\Controllers\XuatKhoController;
use App\Http\Middleware\CheckLoginAdmin;
use Faker\Provider\bn_BD\Address;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// route::get('/viewAdmin', [viewAdmin::class, 'viewAdmin']);
// route::get('/quanlysanpham', [quanlysanpham::class, 'quanlysanpham']);
route::get("/logout", [authenticateController::class, 'logout'])->name('logout');
route::post('/loginProcess', [authenticateController::class, 'loginProcess'])->name('login_Process');
Route::get('/loginAdmin', [authenticateController::class, 'loginAdmin'])->name('loginAdmin');
Route::middleware([CheckLoginAdmin::class])->group(function () {
});
// quản lý chức vụ & Admin
route::resource('Chucvu', ChucVucontroller::class);
route::resource('Admin', AdminController::class);
// Sản phẩm
Route::resource('Trangthaisanpham', TrangThaiSanPhamController::class);
Route::resource('SanPham', SanPhamController::class);
Route::resource('AnhSanPham', anhSanPham2::class);
Route::resource('DanhMuc', DanhMucController::class);
//kho hàng
Route::resource('TinhTrangXuatNhap', TinhTrangXuatNhapController::class);
Route::resource('NhapKho', NhapKhoController::class);
Route::resource('XuatKho', XuatKhoController::class);
Route::resource('KhoHang', KhoHangcontronller::class);
Route::resource('DuyetKhoHang', DuyetKhoHang::class);
//Hóa Đơn
Route::resource('TrangThaiHoaDon', TrangThaiHoaDonController::class);

//Địa Chỉ
Route::resource('ThanhPho', ThanhPhoController::class);
Route::resource('Quan', QuanController::class);
Route::resource('Phuong', PhuongController::class);

// phân Loại Khách Hàng 
Route::resource('PhanLoaiKhachHang', PhanLoaiController::class);

//Mã Khuyến Mãi 
Route::resource('KhuyenMaiKhachHang', KhuyenMaiKhachHangController::class);
route::resource('KhuyenMaiChiTiet', KhuyenMaiDetailController::class);
//Đăng Kí
Route::get('/DangKi', [RegisterController::class, 'Register'])->name('DangKi');
Route::post('dangkyProcess', [RegisterController::class, 'dangkyProcess'])->name('dangkyProcess');
Route::resource('KhachHang', KhachHangController::class);
//Đăng Nhập User 
Route::get('/loginUser', [authenticateUser::class, 'loginUser'])->name('loginUser');
route::post('/loginUserProcess', [authenticateUser::class, 'loginProcessUser'])->name('login_Process_User');
route::get("/logoutUser", [authenticateUser::class, 'logout'])->name('logoutUser');
//Trang Chủ 

Route::get('/', ['App\Http\Controllers\TrangChuController', 'trangChu'])->name('TrangChuView');

Route::resource('ChiTietSanPham', SPchitietController::class);
Route::resource('ChinhSuaThongTin', ChinhSuaThongTinController::class);
// Hóa đơn 
Route::resource('HoaDonChiTiet', HoaDonChiTietController::class);
Route::resource('HoaDonThanhToan', HoaDonController::class);
Route::get('DuyetHoaDon', [DuyetHoaDon::class, 'DuyetHoaDon1'])->name('hoadondaduyet');
Route::get('LichSuHoaDon', [lichsudonhang::class, 'LichSuHoaDon'])->name('LichSuHoaDon');
// route::get('ChiTietHoaDon', [ChiTietHoaDon::class], 'ChiTietHoaDon')->name('ChiTietHD');
Route::resource('ChiTietHD2', ChiTietHD2::class);
// tăng giảm số lượng sản phẩm 
route::get('tangsoluongSP', [tangGiamSoLuongSanPhamGioHang::class, 'tangSoLuongSanPham'])->name('tangSoLuongSanPhamGioHang');
route::get('giamsoluongSP', [tangGiamSoLuongSanPhamGioHang::class, 'giamSoLuongSanPham'])->name('giamSoLuongSanPhamGioHang');
// Thống Kê
Route::get('ThongKe-SoLuong', [ThongKeSL::class, 'ThongKeSLnam'])->name('ThongkeSL');
Route::resource('ThongKeDoanhThu', ThongKeDoanhThu::class);
Route::resource('ThongKeNgay', ThongKeNgay::class);
Route::get('SP-Ban-Chay', [SPBanChay::class, 'SPBanChay'])->name('SPbanchay');
Route::get('Chi-Tiet-SP', [ChiTietSP::class, 'ChiTietSP'])->name('ChiTietSP');
