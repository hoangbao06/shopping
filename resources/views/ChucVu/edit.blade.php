@extends('layouts.app')
@section('content')	
<div class="card">
    {{-- sửa --}}
    <form method="post" action="{{route('Chucvu.update',$chucvu->idChucVu)}}">
        @method("PUT")
        @csrf
        <div class="card-header">
            <Div class="text-center">
                <h4 class="card-title">
                    Sửa tên chức vụ
                </h4>
            </Div>
        </div>
        <div class="card-content">
            <div class="form-group">
                <Div class="text-center">
                    <label>Tên Chức Vụ</label>
                    <input type="text" name="Sua_chuc_vu"  class="form-control" value="{{  $chucvu->nameChucvu}}">
                </Div>
            </div>
            <Div class="text-center">
                <button type="submit" class="btn btn-fill btn-info">Sửa</button>
            </Div>
        </div>
    </form>
</div> 
 @endsection