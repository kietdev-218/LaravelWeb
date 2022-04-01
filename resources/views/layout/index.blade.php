<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>my Food| chia sẽ địa điểm ở Long Xuyên</title>
    <link rel="shortcut icon" type="image/x-icon" href="upload/freelance.png" />
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/css/shop-homepage.css" rel="stylesheet">
    <link href="public/css/my.css" rel="stylesheet">
    <link href="public/admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    @yield('css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
        <div class="shadow">
	    @include('layout.header')
    	@yield('content')

     	@include('layout.footer')
        <!-- jQuery -->
        <script src="public/js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="public/js/bootstrap.min.js"></script>
        <script src="public/js/my.js"></script>

        @yield('script')
        </div>
</body>
</html>


<style type="text/css">
    .shadow {
        background: #b0e0e6;
        margin-top: -11px;
}
</style>