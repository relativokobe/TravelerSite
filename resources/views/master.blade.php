
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cebu Route Project &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('asset/css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('asset/css/icomoon.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('asset/css/bootstrap.css')}}">
	<!-- Superfish -->
	<link rel="stylesheet" href="{{asset('asset/css/superfish.css')}}">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('asset/css/magnific-popup.css')}}">
	<!-- Date Picker -->
	<link rel="stylesheet" href="{{asset('asset/css/bootstrap-datepicker.min.css')}}">
	<!-- CS Select -->
	<link rel="stylesheet" href="{{asset('asset/css/cs-select.css')}}">
	<link rel="stylesheet" href="{{asset('asset/css/cs-skin-border.css')}}">
	
	<link rel="stylesheet" href="{{asset('asset/css/style.css')}}">

	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Modernizr JS -->
	<script src="{{asset('asset/js/modernizr-2.6.2.min.js')}}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>

	<body class="masterbody" style="background: rgba(255, 140, 0, 0.5);">
	<div id="fh5co-wrapper">
		<div id="fh5co-page">
		@yield('content')
		</div>
		</div>

	@include('scripts')	
	</body>
</html>

