@extends('layouts.app')
@section('content')	
<div class="card">
    <div >
        <div class="card">
            <form class="form-horizontal" method="post" action="{{route('Admin.store')}}">
                @csrf
                <div  class="text-center">
                    <h4 class="card-title">
                        Thêm Tài khoản Nhân Viên
                    </h4>
                </div>
                <div class="card-content">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Name Admin</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="Full Name" name="Ten_Nhan_vien" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="email" placeholder="Email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" placeholder="Password" name="pass" class="form-control">
                        </div>
                        <br>
                        <br>
                        <div class="row" > 
                            <br>
                            <div class="col-sm-4"> </div>
                            <div class="col-sm-4"> 
                                <select class="selectpicker" data-style="btn btn-danger btn-block" title="Chức Vụ" data-size="7" name="quyen">
                                    @foreach ($quyen as $Chucvu)                                                                         
                                    <option value="{{ $Chucvu->idChucVu }}">{{ $Chucvu->nameChucvu }}</option>               
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4"> </div>
                            </div>
                        </div>
                <div class="card-footer">
                    <div class="form-group">
                        <label class="col-md-3"></label>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-fill btn-info">
                                Create
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div> <!-- end card -->
    </div>
 @endsection