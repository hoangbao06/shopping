@extends('layouts.app')
@section('content')	

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="text-center">
                        <form class="navbar-form  navbar-search-form" role="search">
                            <div class="input-group">
                               
                                
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
                                    <th data-field="name" data-sortable="true">Name</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>category</th>

                                </tr>
                 
                            </thead>
                            <?PHP 
                                $i = 1;
                            ?>
                     
                            <tbody>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td>{{$chitietSP->nameSanPham}}</td>          
                                    <td>{{number_format($chitietSP->gia_SP , 0, ".",".")}}</td>
                                    <td><img src="{{ $chitietSP->anh}}" style="width:100px;height:100px;border-radius: 20px" ></td>
                                    <td>{{$chitietSP->nameDanhMuc}}</td>
                                </tr>                                    
                            </tbody>
                  

                           
                        </table>
                        <div class="text-center">
                        {{-- {{$sanpham->appends([
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