@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tuc
                    <small>Them</small>
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

                <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>The Loai</label>
                        <select class="form-control" name="TheLoai" id="TheLoai">
                            <option value="0">Please Choose Category</option>
                            @foreach($theloai as $tl)
                              <option value="{{ $tl->id }}">{{ $tl->Ten }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Loai Tin</label>
                        <select class="form-control" name="LoaiTin" id="LoaiTin">
                            <option value="0">Please Choose Category</option>
                            @foreach($loaitin as $lt)
                              <option value="{{ $lt->id }}">{{ $lt->Ten }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tieu De</label>
                        <input class="form-control" name="TieuDe" placeholder="Nhap Tieu De" />
                    </div>
                    
                    <div class="form-group">
                        <label>Tom Tat</label>
                        <textarea name="TomTat" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Noi Dung</label>
                        <textarea name = "NoiDung" class="form-control" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                      <label>Hinh anh</label>
                      <input type="file" name="Hinh" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Noi Bat</label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="1" checked="" type="radio">Co
                        </label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="0" type="radio">Khong
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Them</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection

@section('script')
  <script>
    $(document).ready(function() {
      $('#TheLoai').change(function() {
        var idTheLoai = $(this).val();
        $.get("admin/ajax/LoaiTin/" + idTheLoai, function(data){
          // alert(data);
          $("#LoaiTin").html(data);
        });
      });
    });
  </script>
@endsection