@extends('layouts.app')
@section('content')	
<div class="card">
    {{-- thêm sử POSt --}}
    <form  action="{{route('Chucvu.store')}}">
        @csrf
        <div class="card-header">
            <h4 class="card-title">
                thêm chức vụ
            </h4>
        </div>
        <div class="card-content">
            <div class="form-group">
                <label>Tên Chức Vụ</label>
                <input type="text" name="ten_Chuc_Vu"  class="form-control">
            </div>
            <button type="submit" class="btn btn-fill btn-info">Submit</button>
        </div>
    </form>
</div> 
 @endsection