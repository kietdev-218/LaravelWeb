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
            	<div class="panel-heading" style="background-color:#DC143C; color:white;" >
            		<h2 style="margin-top:0px; margin-bottom:0px;margin-left:30px;"></i>Địa điểm nổi bật</h2>
            	</div>

            	<div class="panel-body">
            		@foreach($theloai as $tl)
            			@if(count($tl->loaidiadiem) > 0)
		        		<!-- item -->
					    <div class="row-item row">
		                	<h3>
		                		<a href="theotheloai">{{$tl->Ten}}</a> |
		                	</h3>
		                	<?php
		                	$data = $tl->ttmonan->where('NoiBat',1)->sortByDesc('created_at')->take(3);
		                	$tin1 = $data->shift();
		              		$tin2 = $data->shift();
		                	  ?>
		                	<div class="col-md-6 border-right">
		                		<div class="col-md-5">
			                        <a href="ttmonan/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">
			                            <img class="img-responsive" src="public/upload/ttmonan/{{$tin1['Hinh']}}" alt="">
			                        </a>
			                        <br>
			                        <a class="btn btn-danger" href="ttmonan/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
			                    </div>

			                    <div class="col-md-7">
			                        <h4>{{$tin1['TieuDe']}}</h4>
			                        <h5>Địa chỉ: {{$tin1['TomTat']}}</h5>
			                        
								</div>
		                	</div>

		                	<div class="col-md-6 border-right">
		                		<div class="col-md-5">
			                        <a href="ttmonan/{{$tin2['id']}}/{{$tin2['TieuDeKhongDau']}}.html">
			                            <img class="img-responsive" src="public/upload/ttmonan/{{$tin2['Hinh']}}" alt="">
			                        </a>
			                        <br>
			                        <a class="btn btn-danger" href="ttmonan/{{$tin2['id']}}/{{$tin2['TieuDeKhongDau']}}.html">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
			                    </div>

			                    <div class="col-md-7">
			                        <h4>{{$tin2['TieuDe']}}</h4>
			                        <h5>Địa chỉ: {{$tin2['TomTat']}}</h5>
								</div>
		                	</div>
		                    
		                    
							
							<div class="break"></div>
		                </div>
		                <!-- end item -->
		                @endif
	                @endforeach

				</div>
            </div>
        </div>
        
    </div>
    <!-- /.row -->
</div>
<link rel="stylesheet" type="text/css" href="public/css/menu.css">
<link href="public/admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- end Page Content -->
@endsection
