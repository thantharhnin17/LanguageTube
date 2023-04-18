<!DOCTYPE html>
<html lang="en">

<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	
	<!-- DESCRIPTION -->
	<meta name="description" content="LanguageTube" />
	
	<!-- OG -->
	
	
	<!-- FAVICONS ICON ============================================= -->
	{{-- <link rel="icon" href="{{asset ('frontend/images/favicon.ico')}}" type="image/x-icon" /> --}}
	<link rel="shortcut icon" type="image/x-icon" href="{{asset ('frontend/images/globe.svg')}}" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>LanguageTube : @yield('title') </title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	
	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{asset ('frontend/css/assets.css')}}">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{asset ('frontend/css/typography.css')}}">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{asset ('frontend/css/shortcodes/shortcodes.css')}}">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{asset ('frontend/css/style.css')}}">
	<link class="skin" rel="stylesheet" type="text/css" href="{{asset ('frontend/css/color/color-1.css')}}">
	
	<!-- REVOLUTION SLIDER CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{asset ('frontend/vendors/revolution/css/layers.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset ('frontend/vendors/revolution/css/settings.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset ('frontend/vendors/revolution/css/navigation.css')}}">
	<!-- REVOLUTION SLIDER END -->	

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

 <!-- //////////////////////header///////////////////// -->
@include('parts.header')

    <!-- //////////////////////main session///////////////////// -->
    @yield('content')

<!-- //////////////////////footer///////////////////// -->
@include('parts.footer')


<!-- External JavaScripts -->
<script src="{{asset ('frontend/js/jquery.min.js')}}"></script>
<script src="{{asset ('frontend/vendors/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset ('frontend/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset ('frontend/vendors/bootstrap-select/bootstrap-select.min.js')}}"></script>
<script src="{{asset ('frontend/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script>
<script src="{{asset ('frontend/vendors/magnific-popup/magnific-popup.js')}}"></script>
<script src="{{asset ('frontend/vendors/counter/waypoints-min.js')}}"></script>
<script src="{{asset ('frontend/vendors/counter/counterup.min.js')}}"></script>
<script src="{{asset ('frontend/vendors/imagesloaded/imagesloaded.js')}}"></script>
<script src="{{asset ('frontend/vendors/masonry/masonry.js')}}"></script>
<script src="{{asset ('frontend/vendors/masonry/filter.js')}}"></script>
<script src="{{asset ('frontend/vendors/owl-carousel/owl.carousel.js')}}"></script>
<script src="{{asset ('frontend/js/functions.js')}}"></script>
<script src="{{asset ('frontend/js/contact.js')}}"></script>
<!-- <script src='assets/vendors/switcher/switcher.js'></script> -->
</body>

</html>