@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn hàng
                    <small>Danh sách</small>
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
                        <th>ID</th>
                        <th>Tên Khách Hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Tổng tiền</th>
                        <th>Hình thức thanh toán</th>     
                        <th>Trạng thái</th>                   
                        <th>Delete</th>
                        <th>Edit</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order as $o)
                    <tr class="odd gradeX" align="center">
                        <td>{{$o->id}}</td>
                        <td>{{$o->customer->name}}</td>
                        <td>{{$o->date_order}}</td>
                        <td>{{$o->total}}</td>
                        <td>{{$o->payment}}</td>   
                        <td>
                        @if($o->status == 1)
                          {{ "Hoàn thành" }}
                        @else
                          {{ "Đang xử lý" }}
                        @endif
                          <!-- <select name="status" id="">
                            <option value=""></option>
                            <option value=""></option>
                          </select> -->
                        </td>                     
                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/order/xoa/{{ $o->id }}">Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/order/sua/{{ $o->id }}">Edit</a></td>
                        <td class="center"><i class="fa fa-fw"></i> <a href="admin/order/chitiet/{{ $o->id }}">Detail</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection