@extends('layouts.app')
@section('content')	
<div class="card">
    {{-- sửa --}}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                {{-- thêm sử POSt --}}
                <form method="post" action="{{route('Quan.update',$Quan->idQuan)}}">
                    @method("PUT")
                    @csrf
                    <div class="card-header">
                        <Div class="text-center">
                            <h4 class="card-title" style="ma">
                                Sửa tên Quận
                            </h4>
                        </Div>
                    </div>
                    <div class="card-content">
                        <div class="form-group">
                            <Div class="text-center">
                                <label>Tên Quận</label>
                                <input type="text" name="Sua_Ten_Quan"  class="form-control" value="{{$Quan->nameQuan}}">
                            </Div>
                        </div>
                        <div class="form-group">
                            <Div class="text-center">
                                <select class="selectpicker" data-style="btn btn-danger btn-block" title="ThuộcThành Phố" data-size="7" name="sua_idthanhpho">
                                    @foreach ($thanhpho as $ThanhPho)                                                                         
                                    <option value="{{ $ThanhPho->idThanhPho}}">{{ $ThanhPho->nameThanhPho}}</option>               
                                    @endforeach
                                </select>
                            </Div> 
                        </div> 
                        <div class="form-group">
                            <Div class="text-center">
                                <button type="submit" class="btn btn-fill btn-info"  onclick="return confirm('Bạn Có Muốn Sửa Quận Này Không ?');">Submit</button>
                            </Div> 
                        </div>             
                    </div>                   
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div> 
 @endsection