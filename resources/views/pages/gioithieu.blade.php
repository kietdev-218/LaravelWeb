@extends('layout.index')
@section('content')
<!-- Page Content -->
<div class="container">

	@include('layout.slide')

    <div class="space20"></div>


    <div class="row main-left">

    	@include('layout.menu')

        <div class="col-md-9">
            <div class="panel panel-default">            
            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
            		<h2 style="margin-top:0px; margin-bottom:0px;">Giới thiệu về myFood</h2>
            	</div>

            	<div class="panel-body">
            		<!-- item -->
                    <h3><span class="glyphicon glyphicon-education"></span> myFood.vn là gì?</h3>
                    <p>myFood cho phép mọi người đến và tìm thông tin địa chỉ mong muốn trên phạm vi Thành Phố Long Xuyên</p>
				    
                    <div class="break"></div>
				   	<h4><span class= "glyphicon glyphicon-bullhorn "></span> Bình luận & Đánh giá </h4>
                    <p> Người dùng đã đăng kí tài khoản có thể bình luận</p>

				</div>
            </div>
    	</div>
    </div>
    <!-- /.row -->
</div>
<!-- end Page Content -->
@endsection