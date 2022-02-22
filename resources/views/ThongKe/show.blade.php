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
                                    <th data-field="name" data-sortable="true" class="text-center">Tổng Hóa Đơn Tháng {{$thang}}</th>
                                    <th data-field="actions" class="text-center"  data-events="operateEvents" data-formatter="operateFormatter" >Actions</th>
                                </tr>
                 
                            </thead>
                        
                            <tbody>
                                <tr>
                                    <td class="text-center">{{$tonghoadon}}</td>
                                   {{-- xem --}}
                                   <td class="text-center">
                                        <form action="{{ route('ThongKeNgay.show',$thang) }}" method="get">
                                            <button class="btn btn-fill btn-info text-center">Chi Tiết tháng </button> 
                                        </form>	
                                    </td>
                                </tr>                                    
                            </tbody>
                                                               
                            <tbody>
                                <tr>
                                    <td class="text-center"></td>
                                    {{-- {{number_format($thongkethang, 0, ".",".")}} --}}
                                    <td class="text-center"><h3>{{number_format($thongkethang, 0, ".",".")}} VNĐ</h3></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-center">
                        {{-- {{$hoadon->appends([
                            'search' => $search
                        ])->links() }} --}}
                        </div>
                    </div>
                </div><!--  end card  -->
            </div> <!-- end col-md-12 -->
        </div> <!-- end row -->
    </div>
</div>
 @endsection