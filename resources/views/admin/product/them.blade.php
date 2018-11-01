@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sách
                    <small>Thêm sách</small>
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

                <form action="admin/product/them" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Thể Loại</label>
                        <select class="form-control" name="category">
                            <option value="0">Chọn Thể Loại Sách</option>
                            @foreach($theloai as $tl)
                            <option value="{{$tl->id}}">{{ $tl->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tên Sách</label>
                        <input class="form-control" name="name" placeholder="Nhập tên sách" />
                    </div>

                    <div class="form-group">
                        <label>Tên Tác Giả</label>
                        <input class="form-control" name="author" placeholder="Nhập tên tác giả" />
                    </div>

                    <div class="form-group">
                        <label>Tên nhà xuất bản</label>
                        <input class="form-control" name="publisher" placeholder="Nhập tên nhà xuất bản" />
                    </div>

                    <div class="form-group">
                        <label>Giá thực</label>
                        <input class="form-control" name="unit_price" placeholder="Nhập Giá thực" />
                    </div>

                    <div class="form-group">
                        <label>Giá khuyến mãi</label>
                        <input class="form-control" name="promotion_price" placeholder="Nhập Giá khuyến mãi" />
                    </div>

                    <div class="form-group">
                        <label>Số lượng</label>
                        <input class="form-control" name="amount" placeholder="Nhập Số lượng" />
                    </div>

                    <!-- <div class="form-group">
                        <label>Tên Tác Giả</label>
                        <input class="form-control" name="author" placeholder="Nhập tên tác giả" />
                    </div> -->

                    <div class="form-group">
                        <label>Số trang</label>
                        <input class="form-control" name="pages" placeholder="Nhập Số trang" />
                    </div>

                    <div class="form-group">
                        <label>Kích thước sách</label>
                        <input class="form-control" name="book_size" placeholder="Nhập Kích thước sách" />
                    </div>

                    <div class="form-group">
                        <label>Tên ảnh</label>
                        <input class="form-control" name="image" placeholder="Nhập Tên ảnh" />
                    </div>

                    <div class="form-group">
                        <label>Năm sản xuất</label>
                        <input class="form-control" name="year_publish" placeholder="Năm sản xuất" />
                    </div>

                    <div class="form-group">
                        <label>Mô tả</label>
                        <input class="form-control" name="description" placeholder="Nhập Mô tả" />
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