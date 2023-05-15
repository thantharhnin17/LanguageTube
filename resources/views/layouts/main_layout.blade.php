<!DOCTYPE html>
<html lang="en">

<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	
	<!-- DESCRIPTION -->
	<meta name="description" content="LanguageTube" />
	
	<!-- OG -->
	
	
	<!-- FAVICONS ICON ============================================= -->
	{{-- <link rel="icon" href="{{asset ('main/images/favicon.ico')}}" type="image/x-icon" /> --}}
	<link rel="shortcut icon" type="image/x-icon" href="{{asset ('main/images/globe.svg')}}" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>LanguageTube : @yield('title') </title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	
	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{asset ('main/css/assets.css')}}">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{asset ('main/css/typography.css')}}">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{asset ('main/css/shortcodes/shortcodes.css')}}">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{asset ('main/css/style.css')}}">
	<link class="skin" rel="stylesheet" type="text/css" href="{{asset ('main/css/color/color-1.css')}}">
	
	<!-- REVOLUTION SLIDER CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{asset ('main/vendors/revolution/css/layers.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset ('main/vendors/revolution/css/settings.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset ('main/vendors/revolution/css/navigation.css')}}">
	<!-- REVOLUTION SLIDER END -->	

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- External JavaScripts -->
<script src="{{asset ('main/js/jquery.min.js')}}"></script>
<script src="{{asset ('main/vendors/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset ('main/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset ('main/vendors/bootstrap-select/bootstrap-select.min.js')}}"></script>
<script src="{{asset ('main/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script>
<script src="{{asset ('main/vendors/magnific-popup/magnific-popup.js')}}"></script>
<script src="{{asset ('main/vendors/counter/waypoints-min.js')}}"></script>
<script src="{{asset ('main/vendors/counter/counterup.min.js')}}"></script>
<script src="{{asset ('main/vendors/imagesloaded/imagesloaded.js')}}"></script>
<script src="{{asset ('main/vendors/masonry/masonry.js')}}"></script>
<script src="{{asset ('main/vendors/masonry/filter.js')}}"></script>
<script src="{{asset ('main/vendors/owl-carousel/owl.carousel.js')}}"></script>
<script src="{{asset ('main/js/functions.js')}}"></script>
<script src="{{asset ('main/js/contact.js')}}"></script>
<script src="{{asset ('main/js/jquery.scroller.js')}}"></script>
<!-- <script src='assets/vendors/switcher/switcher.js'></script> -->
@vite(['resources/js/app.js'])
<script src="{{asset ('admin/js/swal.js')}}"></script>
</head>

 <!-- //////////////////////header///////////////////// -->
@include('main.parts.header')

    <!-- //////////////////////main session///////////////////// -->
    @yield('content')

<!-- //////////////////////footer///////////////////// -->
@include('main.parts.footer')



</body>

</html>