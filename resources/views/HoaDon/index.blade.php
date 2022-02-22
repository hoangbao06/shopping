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
                                    <th data-field="id" class="text-left"> STT</th>
                                    <th data-field="name" data-sortable="true">Tên Hóa đơn</th>
                                    <th>Ngày Đặt</th>
                                    <th>Ghi Chú</th>
                                    <th>Tổng Thanh Toán </th>
                                    <th>Trạng Thái</th>
                                    <th data-field="actions" class="td-actions text-center" data-events="operateEvents" data-formatter="operateFormatter">Actions</th>
                                </tr>
                 
                            </thead>
                            <?PHP 
                            $i = 1;
                            ?>
                            @foreach ($hoadon  as $HoaDon)    
                            <tbody>
                                <tr>
                                    <td><?PHP  echo($i++) ?></td> 
                                    <td>{{$HoaDon->nameHoaDon}}</td>
                                    <td>{{$HoaDon->ngayDat}}</td>
                                    <td>{{$HoaDon->ghiChu}}</td>
                                    
                                    <td>{{number_format($HoaDon->thanhtien, 0, ".",".")}}</td>
                                    <td>{{$HoaDon->nameTrangThai}}</td>
                                    {{-- <td><input type="tel" value="{{$HoaDon->idTrangThaiHoaDon}}" name="Trang_Thai"></td> --}}
                                    <td>{{$HoaDon->Ma_khuyen_mai}}</td> 
                                   {{-- sửa --}}
                                   <td>
                                   <form action="{{ route('HoaDonThanhToan.update', $HoaDon->idHoadon) }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <button class="btn btn-fill btn-info">Duyệt Hóa Đơn</button>
                                    </form> 
                                </td>
                                    {{-- Xóa --}}
                                    <td>
                                        <form action="{{ route('HoaDonThanhToan.destroy', $HoaDon->idHoadon) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-fill btn-info">xóa</button>
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