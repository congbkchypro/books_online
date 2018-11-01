@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thành viên
                    <small>Thêm</small>
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
                
                <form action="admin/user/them" method="POST">     
                    <input type="hidden" name="_token" value=" {{ csrf_token() }}">         
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" name="full_name" placeholder="Nhập tên" />
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" name="phone" placeholder="Nhập Số điện thoại" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Nhập Email" />
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
                        <input class="form-control" name="address" placeholder="Nhập Địa chỉ" />
                    </div>                    
                    <div class="form-group">
                        <label>Quyền người dùng</label>
                        <label class="radio-inline">
                            <input name="permission" value="0" checked="" type="radio">Thường
                        </label>
                        <label class="radio-inline">
                            <input name="permission" value="1" type="radio">Admin
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection