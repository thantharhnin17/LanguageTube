<!DOCTYPE html>
<html lang="en">


<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	
	<!-- DESCRIPTION -->
	<meta name="description" content="EduChamp : Education HTML Template" />
	
	<!-- OG -->
	<meta property="og:title" content="EduChamp : Education HTML Template" />
	<meta property="og:description" content="EduChamp : Education HTML Template" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
	{{-- <link rel="icon" href="../error-404.html" type="image/x-icon" /> --}}
	<link rel="shortcut icon" type="image/x-icon" href="{{asset ('backend/images/gear-solid.svg')}}" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>EduChamp : Education HTML Template </title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	
	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{asset ('admin/css/assets.css')}}">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{asset ('admin/css/typography.css')}}">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{asset ('admin/css/shortcodes/shortcodes.css')}}">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{asset ('admin/css/style.css')}}">
	<link class="skin" rel="stylesheet" type="text/css" href="{{asset ('admin/css/color/color-1.css')}}">

	<!-- External JavaScripts -->
<script src="{{asset ('admin/js/jquery.min.js')}}"></script>
<script src="{{asset ('admin/vendors/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset ('admin/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset ('admin/vendors/bootstrap-select/bootstrap-select.min.js')}}"></script>
<script src="{{asset ('admin/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script>
<script src="{{asset ('admin/vendors/magnific-popup/magnific-popup.js')}}"></script>
<script src="{{asset ('admin/vendors/counter/waypoints-min.js')}}"></script>
<script src="{{asset ('admin/vendors/counter/counterup.min.js')}}"></script>
<script src="{{asset ('admin/vendors/imagesloaded/imagesloaded.js')}}"></script>
<script src="{{asset ('admin/vendors/masonry/masonry.js')}}"></script>
<script src="{{asset ('admin/vendors/masonry/filter.js')}}"></script>
<script src="{{asset ('admin/vendors/owl-carousel/owl.carousel.js')}}"></script>
<script src="{{asset ('admin/js/functions.js')}}"></script>
<script src="{{asset ('admin/js/contact.js')}}"></script>

</head>
<body id="bg">
<div class="page-wraper">
    @yield('content')

</div>

</body>

</html>