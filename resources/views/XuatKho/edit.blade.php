@extends('layouts.app')
@section('content')	
<div class="card">
    <div class="text-center">
        <div class="card">
            <form class="form-horizontal" method="post" action="{{route('XuatKho.update',$xuatkho->idXuatKho)}}" enctype="multipart/form-data">
                @method("PUT")
                @csrf
                <div class="card-header">
                    <h4 class="card-title">
                      Sửa Sản Phẩm
                    </h4>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Số Lượng</label>
                    <div class="col-md-9">
                        <select class="selectpicker" data-style="btn btn-danger btn-block" title="Trạng thái" data-size="7" name="Sua_TinhTrang2">
                            @foreach ($tinhtrang as $TinhTrang)                                                                         
                            <option  value="{{$TinhTrang->idTinhTrangXuatNhap}}">{{$TinhTrang->nameTinhTrangXuatNhap}}</option>               
                            @endforeach
                        </select>
                    </div>
                </div>   

                <div class="form-group">
                    <label class="col-md-3 control-label">Số Lượng</label>
                    <div class="col-md-9">
                        <input type="number" placeholder="0" value="{{$xuatkho->soluong_XK}}" name="Sua_So_Luong2" class="form-control">
                    </div>
                </div>              
                    <div class="form-group">
                        <label class="col-md-3 control-label">Ngày Xuất Kho</label>
                        <div class="col-md-9">
                            <input type="date" placeholder="Ngày" name="Sua_Ngay_Xuat" class="form-control">
                        </div>
                    </div>
                <div class="card-footer">
                    <div class="form-group">
                        <label class="col-md-3"></label>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-fill btn-info">
                                submit
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div> <!-- end card -->
    </div>
</div>
 @endsection