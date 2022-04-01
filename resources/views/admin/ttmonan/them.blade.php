@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin địa điểm
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif

                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                
                <form action="admin/ttmonan/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name="TheLoai" id="TheLoai">
                            @foreach($theloai as $tl)
                                <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Loại địa điểm</label>
                        <select class="form-control" name="LoaiDiaDiem" id="LoaiDiaDiem">
                            @foreach($loaidiadiem as $ldd)
                                <option value="{{$ldd->id}}">{{$ldd->Ten}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="TieuDe" placeholder="Nhập tiêu đề" />
                    </div>

                    <div class="form-group">
                        <label>Tóm tắt</label>
                        <textarea name="TomTat" class="form-control" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="NoiDung" id="demo" class="ckeditor" rows="5"></textarea>
                    </div>

                    <div  class="form-group">
                        <label>Hình Ảnh</label>
                        <input type="file" name="Hinh" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label>Nổi bật</label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="0" checked="" type="radio">Không
                        </label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="2" type="radio">Có
                        </label>
                    </div>

                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#TheLoai").change(function(){
                var idTheLoai = $(this).val();
                $.get("admin/ajax/loaidiadiem/"+idTheLoai,function(data){
                    $("#LoaiDiaDiem").html(data);
                });
            });
        });
    </script>
@endsection