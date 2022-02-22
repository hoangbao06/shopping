@extends('layouts.app')
@section('content')	
<div class="card">
    {{-- sửa --}}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                {{-- thêm sử POSt --}}
                <form method="post" action="{{route('Phuong.update',$Phuong->idPhuong)}}">
                    @method("PUT")
                    @csrf
                    <div class="card-header">
                        <Div class="text-center">
                            <h4 class="card-title" style="ma">
                                Sửa tên Phường
                            </h4>
                        </Div>
                    </div>
                    <div class="card-content">
                        <div class="form-group">
                            <Div class="text-center">
                                <label>Tên Phường</label>
                                <input type="text" name="Sua_Ten_Phuong"  class="form-control" value="{{$Phuong->namePhuong}}">
                            </Div>
                        </div>
                        <div class="form-group">
                            <Div class="text-center">
                                <select class="selectpicker" data-style="btn btn-danger btn-block" title="ThuộcThành Phố" data-size="7" name="sua_idQuan">
                                    @foreach ($Quan as $Quan)                                                                         
                                    <option value="{{ $Quan->idQuan}}">{{ $Quan->nameQuan}}</option>               
                                    @endforeach
                                </select>
                            </Div> 
                        </div> 
                        <div class="form-group">
                            <Div class="text-center">
                                <button type="submit" class="btn btn-fill btn-info"  onclick="return confirm('Bạn Có Muốn Sửa Phường Này Không ?');">Submit</button>
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