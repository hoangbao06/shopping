@extends('layouts.app')
@section('content')	
<div class="card">
    <div class="text-center">
        <div class="card">
            <form class="form-horizontal" method="post" action="{{route('XuatKho.store',$idKhoHang)}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h4 class="card-title">
                        Thêm Sản Phẩm Xuất Kho
                    </h4>
                </div>
                <div class="form-group">
                    <div class="row" >
                        <br>
                        <div class="col-sm-4">
                            <input type="hidden" name="idKhoHang" value="{{ $idKhoHang }}">
                            <input type="hidden" name="idSanPham" value="{{ $idSanPham }}">
                        </div>
                        <div class="col-sm-4"> 
                            <select class="selectpicker" data-style="btn btn-danger btn-block" title="Tình trạng" data-size="7" name="ID_Tinh_trang">
                                @foreach ($tinhtrang as $TinhTrang)                                                                         
                                <option value="{{$TinhTrang->idTinhTrangXuatNhap}}">{{$TinhTrang->nameTinhTrangXuatNhap}}</option>               
                                @endforeach
                            </select>
                        </div>
                        </div>  
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Số Lượng</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="Số Lượng" name="So_Luong" class="form-control">
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="col-md-3 control-label">Ngày Nhập Kho</label>
                        <div class="col-md-9">
                            <input type="date" placeholder="Ngày" name="Ngay_Nhap" class="form-control">
                        </div>
                    </div>
                <div class="card-footer">
                    <div class="form-group">
                        <label class="col-md-3"></label>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-fill btn-info">
                                Create
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div> <!-- end card -->
    </div>
</div>
 @endsection