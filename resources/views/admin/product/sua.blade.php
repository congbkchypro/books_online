@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sách
                    <small>{{ $product->name }}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors) > 0)
                  @foreach($errors->all() as $err)
                    <div class="alert alert-danger">
                      {{ $err }} <br>
                    </div>
                  @endforeach
                @endif

                @if(session('thongbao'))
                  <div class="alert alert-success">
                    {{ session('thongbao') }}
                  </div>
                @endif

                <form action="admin/product/sua/{{$product->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Sách</label>
                        <select class="form-control" name="category">
                            <option value="0">Chọn thể loại sách</option>
                            @foreach($theloai as $tl)
                            <option value="{{ $tl->id }}" 
                              @if($product->id_category == $tl->id)
                                {{ "selected" }}    
                              @endif >{{ $tl->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên sách</label>
                        <input class="form-control" name="name" placeholder="Nhập tên sách" value='{{ $product->name }}' />
                    </div>

                    <div class="form-group">
                        <label>Tên tác giả</label>
                        <input class="form-control" name="author" placeholder="Nhập tên tác giả" value='{{ $product->author }}' />
                    </div>

                    <div class="form-group">
                        <label>Nhà xuất bản</label>
                        <input class="form-control" name="publisher" placeholder="Nhập Nhà xuất bản" value='{{ $product->publisher }}' />
                    </div>

                    <div class="form-group">
                        <label>Giá thực</label>
                        <input class="form-control" name="unit_price" placeholder="Nhập giá thực" value='{{ $product->unit_price }}' />
                    </div>

                    <div class="form-group">
                        <label>Giá khuyến mãi</label>
                        <input class="form-control" name="promotion_price" placeholder="Nhập giá khuyến mãi" value='{{ $product->promotion_price }}' />
                    </div>

                    <div class="form-group">
                        <label>Số lượng</label>
                        <input class="form-control" name="amount" placeholder="Nhập số lượng" value='{{ $product->amount }}' />
                    </div>

                    <div class="form-group">
                        <label>Số trang</label>
                        <input class="form-control" name="pages" placeholder="Nhập số trang" value='{{ $product->pages }}' />
                    </div>

                    <div class="form-group">
                        <label>Kích thước</label>
                        <input class="form-control" name="book_size" placeholder="Nhập kích thước" value='{{ $product->book_size }}' />
                    </div>

                    <div class="form-group">
                        <label>Tên ảnh</label>
                        <input class="form-control" name="image" placeholder="Nhập tên ảnh" value='{{ $product->image }}' />
                    </div>

                    <div class="form-group">
                        <label>Năm xuất bản</label>
                        <input class="form-control" name="year_publish" placeholder="Nhập Năm xuất bản" value='{{ $product->year_publish }}' />
                    </div>

                    <div class="form-group">
                        <label>Mô tả</label>
                        <input class="form-control" name="description" placeholder="Nhập mô tả" value='{{ $product->description }}' />
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
<!-- /#page-wrapper -->
@endsection