@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại địa điểm
                    <small>danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
             @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
             @endif

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên loại địa điểm</th>
                        <th>Tên không dấu</th>
                        <th>Thể loại</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loaidiadiem as $ldd)
                        <tr class="odd gradeX" align="center">
                            <td>{{$ldd->id}}</td>
                            <td>{{$ldd->Ten}}</td>
                            <td>{{$ldd->TenKhongDau}}</td>
                            <td>{{$ldd->theloai->Ten}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/loaidiadiem/xoa/{{$ldd->id}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loaidiadiem/sua/{{$ldd->id}}">Edit</a></td>
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