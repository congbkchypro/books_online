@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khách Hàng
                    <small>{{ $order->customer->name }}</small>                
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('thongbao'))
                  <div class="alert alert-success">
                    {{ session('thongbao') }}
                  </div>
            @endif
            
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Tên sách</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng tiền</th>                        
                    </tr>
                </thead>
                <tbody>
                   @foreach($orderDetail as $o)
                    <tr class="odd gradeX" align="center">                        
                        <td>{{ $o->product->name }}</td>
                        <td>{{$o->quantity}}</td>
                        <td>{{$o->unit_price}}</td>
                        <td>{{ $o->quantity * $o->unit_price }}</td>                     
                    </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr align="center">
                        <th>Tổng hóa đơn</th>
                        <th>{{ $order->total }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="row">
          
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection