@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Order
                    <small></small>
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

                <form action="admin/order/sua/{{ $order->id }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    

                    <div class="form-group">
                        <label>Tên Khách Hàng</label>
                        <input class="form-control" name="name" placeholder="Nhap Tieu De" value="{{ $order->customer->name }}" readonly="" />
                    </div>
                    
                    <div class="form-group">
                        <label>Ngày đặt hàng</label>
                        <input class="form-control" name="date_order" placeholder="Nhap Tieu De" value="{{ $order->date_order }}" readonly="" />
                    </div>

                    <div class="form-group">
                        <label>Tổng tiền</label>
                        <input class="form-control" name="total" placeholder="Nhap Tieu De" value="{{ $order->total }}" readonly="" />
                    </div>

                    <div class="form-group">
                        <label>Hình thức thanh toán</label>
                        <input class="form-control" name="payment" placeholder="Nhap Tieu De" value="{{ $order->payment }}" readonly="" />
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <input class="form-control" name="status" placeholder="Nhap Tieu De" value="{{ $order->status }}" @if($order->status==1) {{ "readonly=''" }} @endif/>
                    
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <!-- <button type="reset" class="btn btn-default">Reset</button> -->
                <form>
            </div>
        </div>
        <!-- /.row -->        

    </div>
    <!-- /.container-fluid -->
</div>
@endsection

@section('script')
  <!-- <script>
    $(document).ready(function() {
      $('#TheLoai').change(function() {
        var idTheLoai = $(this).val();
        $.get("admin/ajax/LoaiTin/" + idTheLoai, function(data){
          // alert(data);
          $("#LoaiTin").html(data);
        });
      });
    });
  </script> -->
@endsection