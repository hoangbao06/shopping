@extends('layouts.app')
@section('content')	

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- thêm sử POSt --}}
                    </form>
                </div> 
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="card">
                            {{-- thêm sử POSt --}}
                            <form method="post" action="{{route('Phuong.store')}}">
                                @csrf
                                <div class="card-header">
                                    <Div class="text-center">
                                        <h4 class="card-title" style="ma">
                                            thêm Phường
                                        </h4>
                                    </Div>
                                </div>
                                <div class="card-content">
                                    <div class="form-group">
                                        <Div class="text-center">
                                            <label>Tên Phường</label>
                                            <input type="text" name="ten_Phuong"  class="form-control">
                                        </Div>
                                    </div>
                                    <div class="form-group">
                                        <Div class="text-center">
                                            <select class="selectpicker" data-style="btn btn-danger btn-block" title="Thuộc Quận" data-size="7" name="idQuan">
                                                @foreach ($Quan as $Quan)                                                                         
                                                <option value="{{ $Quan->idQuan}}">{{ $Quan->nameQuan}}</option>               
                                                @endforeach
                                            </select>
                                        </Div> 
                                    </div> 
                                    <div class="form-group">
                                        <Div class="text-center">
                                            <button type="submit" class="btn btn-fill btn-info"  onclick="return confirm('Bạn Có Muốn Thêm Phường  Này Không ?');">Submit</button>
                                        </Div> 
                                    </div>             
                                </div>                   
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                {{-- tìm kiếm --}}
                <div class="text-center">
                <form class="navbar-form  navbar-search-form" role="search">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="text" value="{{$search}}" name="search" class="form-control" placeholder="Search...">
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
                                    <th data-field="name" data-sortable="true">Tên Phường</th>
                                    <th data-field="name" data-sortable="true">Thuộc Quận</th>
                                    <th data-field="actions" class="td-actions text-center" data-events="operateEvents" data-formatter="operateFormatter">Actions</th>
                                </tr>
                 
                            </thead>
                            <?PHP 
                                $i = 1;
                            ?>
                            @foreach ($listPhuong  as $Phuong)    
                            <tbody>
                                <tr>
                                    <td><?PHP  echo($i++) ?></td>
                                    <td>{{$Phuong->namePhuong}}</td>
                                    <td>{{$Phuong->nameQuan}}</td>
                                   {{-- sửa --}}
                                    <td><a class="btn btn-fill btn-info" href="{{ route('Phuong.edit',$Phuong->idPhuong) }}">Sửa</a></td>
                                    {{-- Xóa --}}
                                    <td>
                                        <form action="{{ route('Phuong.destroy',$Phuong->idPhuong) }}" method="post">
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
                        {{$listPhuong->appends([
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