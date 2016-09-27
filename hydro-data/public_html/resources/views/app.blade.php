<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


		<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Stations & Samples - Index</title>

	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

	<!-- Toastr style -->
	<link href="{{ asset('css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

	<link href="{{ asset('css/plugins/chosen/chosen.css') }}" rel="stylesheet">

	<!-- Gritter -->
	<link href="{{ asset('js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">

	<link href="{{ asset('css/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet">
	<link href="{{ asset('css/plugins/select2/select2.min.css') }}" rel="stylesheet">

	<link href="{{ asset('css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">

	<![endif]-->
</head>
<body>

<div id="wrapper">
	<nav class="navbar-default navbar-static-side" role="navigation">
		<div class="sidebar-collapse">
			<ul class="nav metismenu" id="side-menu">
				<li class="nav-header">
					<!-- logo can be here -->
				</li>

				<li>
					<a href="{{url('/')}}"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Данные по станциям</span></a>
				</li>

				<li>
					<a href="{{url('/create')}}"><i class="fa fa-edit"></i> <span class="nav-label">Ввод данных</span></a>
				</li>

				<li>
					<a href="{{url('/pigment')}}"><i class="fa fa-edit"></i> <span class="nav-label">Данные по пигментам</span></a>
				</li>
				
				<li>
					<a href="{{url('/add')}}"><i class="fa fa-edit"></i> <span class="nav-label">Добавление проб</span></a>
				</li>

			</ul>

		</div>
	</nav>


    @yield('content')
    @yield('footer')


</div>



</body>
</html>
