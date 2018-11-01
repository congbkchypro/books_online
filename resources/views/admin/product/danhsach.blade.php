@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sách
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
                        <th>Tên sách</th>                                            
                        <th>Tác giả</th>
                        <th>Nhà Xuất Bản</th>                        
                        <th>Giá Thực</th>
                        <th>Giá Khuyến Mãi</th>
                        <th>Số Lượng</th>
                        <th>Số Trang</th>
                        <th>Kích Thước Sách</th>
                        <th>Tên ảnh</th>
                        <th>Năm xuất bản</th>                        
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $pr)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $pr->id }}</td>
                        <td>{{ $pr->name }}</td>                                       
                        <td>{{ $pr->author }}</td>
                        <td>{{ $pr->publisher }}</td>
                        <td>{{ $pr->unit_price }}</td>
                        <td>{{ $pr->promotion_price }}</td>
                        <td>{{ $pr->amount }}</td>
                        <td>{{ $pr->pages }}</td>
                        <td>{{ $pr->book_size }}</td>
                        <td>{{ $pr->image }}</td>
                        <td>{{ $pr->year_publish }}</td>                        
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/xoa/{{ $pr->id }}">Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/sua/{{ $pr->id }}">Edit</a></td>
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