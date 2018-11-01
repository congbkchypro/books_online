@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thành viên
                    <small>{{ $user->full_name }}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors) > 0)
                  <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                      {{ $err }} <br>
                    @endforeach
                  </div>
                @endif

                @if(session('thongbao'))
                  <div class="alert alert-success">
                    {{ session('thongbao') }}
                  </div>
                @endif
                
                <form action="admin/user/sua/{{ $user->id }}" method="POST">     
                    <input type="hidden" name="_token" value=" {{ csrf_token() }}">         
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" name="full_name" value="{{ $user->full_name }}" placeholder="Nhập tên" />
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" name="phone" value="{{ $user->phone }}" placeholder="Nhập Số điện thoại" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Nhập Email" readonly="" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Nhập password" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại password</label>
                        <input type="password" class="form-control" name="passwordAgain" placeholder="Nhập lại password" />
                    </div>
                   <!--  <div class="form-group">
                        <label>Phân quyền</label>
                        <input class="form-control" name="permission" placeholder="Nhập quyền" />
                    </div> -->
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" name="address" value="{{ $user->address }}" placeholder="Nhập Địa chỉ" />
                    </div>                    
                    <div class="form-group">
                        <label>Quyền người dùng</label>
                        <label class="radio-inline">
                            <input name="permission" value="0" 
                            @if($user->permission == 0)
                              {{ "checked" }}
                            @endif
                            type="radio">Thường
                        </label>
                        <label class="radio-inline">
                            <input name="permission" value="1"
                            @if($user->permission == 1)
                              {{ "checked" }}
                            @endif 
                            type="radio">Admin
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection