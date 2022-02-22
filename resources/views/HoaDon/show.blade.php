@extends('layouts.app')
@section('content')	

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- thêm  --}}
                    <div class="text-center">
                        <form class="navbar-form  navbar-search-form" role="search">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                {{-- <input type="text" value="{{$search}}" name="search" class="form-control" placeholder="Search..."> --}}
                            </div>
                        </form>
                        </div>
                <div class="card">
                    <div class="card-content">
                        <div class="toolbar">
                            <!--Here you can write extra buttons/actions for the toolbar-->
                        </div>
                        <table id="bootstrap-table" class="table">
                            <thead>
                                <tr>
                                    <th data-field="id" class="text-center"> STT</th>
                                    <th data-field="name" data-sortable="true" class="text-center">Tên Hóa đơn</th>
                                    <th class="text-center">Ngày Đặt</th>
                                    <th class="text-center">Ghi Chú</th>
                                    <th class="text-center">Tổng Thanh Toán </th>
                                    <th class="text-center">Trạng Thái</th>
                                    <th data-field="actions" class="text-center"  data-events="operateEvents" data-formatter="operateFormatter" colspan="3">Actions</th>
                                </tr>
                 
                            </thead>
                            <?PHP 
                                $i = 1;
                            ?>
                            @foreach ($hoadon  as $HoaDon)    
                            <tbody>
                                <tr>
                                    <td class="text-center"><?PHP  echo($i++) ?></td> 
                                    <td class="text-center">{{$HoaDon->nameHoaDon}}</td>
                                    <td class="text-center">{{$HoaDon->ngayDat}}</td>
                                    <td class="text-center">{{$HoaDon->ghiChu}}</td>
                                    
                                    <td class="text-center">{{number_format($HoaDon->thanhtien, 0, ".",".")}}</td>
                                    <td class="text-center">{{$HoaDon->nameTrangThai}}</td>
                                    {{-- <td><input type="tel" value="{{$HoaDon->idTrangThaiHoaDon}}" name="Trang_Thai"></td> --}}
                                    <td class="text-center">{{$HoaDon->Ma_khuyen_mai}}</td> 
                                   {{-- sửa --}}
                                   <td class="text-center"><a href="{{ route('ChiTietHD2.edit', $HoaDon->idHoadon)}}"><button class="btn btn-fill btn-info text-center">Chi Tiết Hóa Đơn</button></a></td>
                                  {{-- <td><a href="{{ route('ChiTietHD', $HoaDon->idHoadon)}}"><button class="btn btn-fill btn-info text-center">Chi Tiết Hóa Đơn</button></a></td> --}}
                                   {{-- <td>
                                    <form action="{{ route('ChiTietHD2.show', $HoaDon->idHoadon) }}" method="post">
                                        @method('get')
                                        @csrf
                                        <button class="btn btn-fill btn-info text-center">Chi Tiết Hóa Đơn</button>
                                    </form>
                                </td> --}}
                                    {{-- Xóa --}}
                                    <td class="text-center">
                                        <form action="{{ route('HoaDonThanhToan.destroy', $HoaDon->idHoadon) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-fill btn-info ">xóa</button>
                                        </form>
                                    </td>
                                </tr>                                    
                            </tbody>
                            @endforeach
                        </table>
                        <div class="text-center">
                        {{$hoadon->appends([
                            'search' => $search
                        ])->links() }}
                        </div>
                    </div>
                </div><!--  end card  -->
            </div> <!-- end col-md-12 -->
        </div> <!-- end row -->
    </div>
</div>
 @endsection