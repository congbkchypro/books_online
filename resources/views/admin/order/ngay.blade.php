@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Doanh thu
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
                        <th>Ngày mua</th>
                        <th>Doanh thu</th>                                            
                    </tr>
                </thead>
                <tbody>
                   @foreach($order as $o)
                    <tr class="odd gradeX" align="center">                        
                        <td>{{ $o->ngay_mua }}</td>
                        <td>{{$o->doanh_thu}} VND</td>
                    </tr>
                    @endforeach
                </tbody>
                
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