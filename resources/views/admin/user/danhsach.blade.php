@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thành viên
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
                        <th>Tên</th>
                        <th>Số điện thoại</th>
                        <th>email</th>
                        <th>Địa chỉ</th>
                        <th>Phân quyền</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $u)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->full_name }}</td>
                        <td>{{ $u->phone }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->address }}</td>                     
                        <td>
                          @if($u->permission == 1)
                            {{ "admin" }}
                          @else
                            {{ "thành viên thường" }}
                          @endif
                        </td>                     
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/xoa/{{ $u->id }}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/sua/{{ $u->id }}">Edit</a></td>
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